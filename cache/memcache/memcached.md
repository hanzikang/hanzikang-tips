windows 安装memcached
1、安装扩展：下载后解压（链接：http://pan.baidu.com/s/1gdWDjMz 密码：6isi）

选择合适的版本，把php_memcache.dll放到php的ext目录子下，在php.ini中添加一行代码：extension=php_memcache.dll。重启服务

2、安装服务：下载地址： http://www.2cto.com/uploadfile/2012/0713/20120713110308123.zip

将下载好的文件解压到某个文件夹下，打开cmd命令行，进入memcached目录，执行memcached -d install命令，安装服务。

如果在没有安装过的情况下，出现"failed to install service or service already installed"错误，可能是cmd.exe需要用管理员身份运行。




Linux 

	<!-- 安装 -->
	wget http://memcached.org/latest                    下载最新版本
	tar -zxvf memcached-1.x.x.tar.gz                    解压源码
	cd memcached-1.x.x                                  进入目录
	./configure --prefix=/usr/local/memcached 			配置
	make && make install                                  编译 && 安装memcached服务

	<!-- 启动 -->
	/usr/local/memcached/bin/memcached -d -l 0.0.0.0 -p 11211 -u root -m 32 -c 64 -P /usr/local/memcached/memcached.pid


	参数介绍

    -p 监听的端口 
    -l 连接的IP地址, 默认是本机 
    -d start 启动memcached服务 
    -d restart 重起memcached服务 
    -d stop|shutdown 关闭正在运行的memcached服务 
    -d install 安装memcached服务 
    -d uninstall 卸载memcached服务 
    -u 以的身份运行 (仅在以root运行的时候有效) 
    -m 最大内存使用，单位MB。默认64MB 
    -M 内存耗尽时返回错误，而不是删除项 
    -c 最大同时连接数，默认是1024 
    -f 块大小增长因子，默认是1.25 
    -n 最小分配空间，key+value+flags默认是48 
    -h 显示帮助