#!/bin/bash
set -e

# Initialize data directory if empty
if [ ! -d "/var/lib/mysql/mysql" ]; then
    echo "Initializing MySQL data directory..."
    mysql_install_db --user=mysql --datadir=/var/lib/mysql
    echo "MySQL data directory initialized."
fi

# Start MySQL in background (normal mode)
mysqld_safe &
MYSQL_PID=$!

# Wait for MySQL to be ready
until mysqladmin ping --silent; do
    sleep 2
done

# Set root password
mysql -uroot <<EOF
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '${MYSQL_ROOT_PASSWORD}';
CREATE USER IF NOT EXISTS 'root'@'%' IDENTIFIED WITH mysql_native_password BY '${MYSQL_ROOT_PASSWORD}';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;
EOF

# Set root password and allow remote access
#mysql -uroot <<EOF
#CREATE USER IF NOT EXISTS 'root'@'%' IDENTIFIED WITH mysql_native_password BY '${MYSQL_ROOT_PASSWORD}';
#GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;
#FLUSH PRIVILEGES;
#EOF

# Import all SQL files
for f in /docker-entrypoint-initdb.d/*.sql; do
    echo "Importing $f..."
    mysql -uroot -p"${MYSQL_ROOT_PASSWORD}" < "$f"
done

# Stop temporary MySQL
kill $MYSQL_PID
wait $MYSQL_PID

# Start MySQL in foreground
exec mysqld_safe
