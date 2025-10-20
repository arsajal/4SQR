# Base image: Ubuntu Linux
FROM ubuntu:22.04

# Install MySQL server and network tools
RUN apt-get update && apt-get install -y mysql-server mysql-client netcat telnet net-tools vim

# Allow remote connections to MySQL
RUN sed -i 's/^bind-address.*/bind-address = 0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf || \
    echo "[mysqld]\nbind-address=0.0.0.0" >> /etc/mysql/my.cnf

# Expose MySQL default port
EXPOSE 3306

# Set the entrypoint script to initialize and start MySQL
COPY all_databases.sql /docker-entrypoint-initdb.d/
COPY docker-entrypoint.sh /usr/local/bin/

#Fix Permission
RUN chmod +x /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /docker-entrypoint-initdb.d/
RUN chown -R mysql:mysql /docker-entrypoint-initdb.d/

# Set the entrypoint to the absolute path
ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]

# Set environment variables
ENV MYSQL_ROOT_PASSWORD=rootpassword

# Start MySQL server
CMD ["mysqld"]