
#git 的基本安装：
例如在linux里面安装git的步骤如下：
	1、sudo apt-get install git；
	2、安装完成之后没有报错的话就可以配置邮箱以及账号： 
		 a、配置邮箱：git config --global user.email "email@example.com"
		 b、配置账号：git config --global user.name "Your Name"
	3、配置完成之后可以查看当前的git的版本号：git --version
	4、生成git的密钥命令如下：
		ssh-keygen -R "email@example.com"
		命令执行后可以重新命名，也可以直接按三次enter键

#gitlab 的基本搭建：
对linux系统的要求：最好是4核的，我的2核的会动不动就卡死
参考地址：https://cloud.tencent.com/developer/article/1593046
例如在linux里面安装gitlab的步骤如下：
	1、这里选择最新版本，gitlab-ce_12.1.4-ce.0_amd64.deb：
	wget --content-disposition https://packages.gitlab.com/gitlab/gitlab-ce/packages/ubuntu/xenial/gitlab-ce_12.1.4-ce.0_amd64.deb/download.deb

	2、本地包安装：dpkg -i gitlab-ce_12.1.4-ce.0_amd64.deb

	3、安装完成之后，你会看到gitlab的icon，以及相关的提示；

	4、修改配置文件：
		a、vim /etc/gitlab/gitlab.rb（如果没有安装vim记得先安装好vim）

		b、修改以下几个：（可以通过/external_url来查找相关内容，匹配成功之后按enter）
			external_url 'http://192.168.10.123:80'
			......
			gitlab_rails['time_zone'] = 'Asia/Shanghai'
			gitlab_rails['gitlab_email_from'] = 'xxxxxx@163.com'
			......
			gitlab_rails['smtp_enable'] = true
			gitlab_rails['smtp_address'] = "smtp.163.com"
			gitlab_rails['smtp_port'] = 25
			gitlab_rails['smtp_user_name'] = "xxxxxx@163.com"
			gitlab_rails['smtp_password'] = "111111" # 客户端授权密码
			gitlab_rails['smtp_domain'] = "163.com"
			gitlab_rails['smtp_authentication'] = "login"
			gitlab_rails['smtp_enable_starttls_auto'] = true
			......
			user["git_user_email"] = "xxxxxx@163.com"
		c、安装完成之后：wq 保存退出

	5、只要修改配置文件就要reconfigure：sudo gitlab-ctl reconfigure

	6、查看gitlab的启动状态：gitlab-ctl status

	7、访问web页面，首次需要修改密码，首次登录用root账号，再输入刚刚改的密码；

	gitlab的相关的命令如下：

		sudo gitlab-ctl reconfigure   #重新加载配置，每次修改/etc/gitlab/gitlab.rb文件之后执行

		sudo gitlab-ctl status        #查看 GitLab 状态

		sudo gitlab-ctl start 		  #启动 GitLab

		sudo gitlab-ctl stop 	 	  #停止 GitLab

	 	sudo gitlab-ctl restart 	  #重启 GitLab

		sudo gitlab-ctl tail 		  #查看所有日志

		sudo gitlab-ctl tail nginx/gitlab_acces.log 	#查看 nginx 访问日志

		sudo gitlab-ctl tail postgresql					#查看 postgresql 日志