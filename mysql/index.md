索引
	分析查询:通过这个查询可以分析查询语句的索引使用情况
	explain select * from xxx where id = xxx

增加索引
	主键
		ALTER TABLE `your_table_name`
		ADD PRIMARY KEY your_index_name(your_column_name);
	唯一索引
		ALTER TABLE `your_table_name`
		ADD UNIQUE your_index_name(your_column_name);
	普通索引
		ALTER TABLE `your_table_name`
		ADD INDEX your_index_name(your_column_name);
	全文索引
		ALTER TABLE `your_table_name`
		ADD FULLTEXT your_index_name(your_column_name);