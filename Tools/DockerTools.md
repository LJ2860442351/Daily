# Docker 相关

拉取docker最新的nginx：docker pull nginx
docker实例化nginx-test:docker run --name nginx-test -p 8080:80 -d nginx
进入到容器的内部：docker exec -it nginx-test bash
退出容器的内容：exit


进入到容器的内部的时候，可以修改nginx的配置文件，类似于一个虚拟的linux的环境，一般nginx的html文件在/usr/share/nginx/html


docker pull mysql
docker run --name mysql-test -p 3306:3306 -e MYSQL_ROOT_PASSWORD=12345678 -d mysql
docker exec -it mysql-test bash


查看正在运行的docker的进程:docker ps


查看所有的docker的进程:docker ps -a

docker运行某个container的：docker start 0dbbcc412fef（容器的id）


docker相关的命令行：

docker image pull是下载镜像的命令。镜像从远程镜像仓库服务的仓库中下载。

默认情况下，镜像会从 Docker Hub 的仓库中拉取。

docker image pull alpine:latest命令会从 Docker Hub 的 alpine 仓库中拉取标签为 latest 的镜像。

docker image ls列出了本地 Docker 主机上存储的镜像。可以通过 --digests 参数来查看镜像的 SHA256 签名。

docker image inspect命令非常有用！该命令完美展示了镜像的细节，包括镜像层数据和元数据。

docker image rm用于删除镜像。

docker image rm alpine:latest
命令的含义是删除 alpine:latest镜像。当镜像存在关联的容器，并且容器处于运行（Up）或者停止（Exited）状态时，不允许删除该镜像。


