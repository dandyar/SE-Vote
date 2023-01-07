# SE-Vote
E-Voting web app using CodeIgniter 3.

## Demo
Username: admin123
Password: password

## Session Driver
In order to use the ‘database’ session driver, you must also create this table.
```sql
CREATE TABLE IF NOT EXISTS `sessions` (
        `id` varchar(128) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)
);
```
Then add the PRIMARY KEY.
```sql
ALTER TABLE sessions ADD PRIMARY KEY (id, ip_address);
```
