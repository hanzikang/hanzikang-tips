

Git 配置
	git config --global user.name "***"   
	git config --global user.email "xxx@gmail.com"
	git config --global color.ui true
	git config --global alias.co checkout
	git config --global alias.ci commit
	git config --global alias.st status
	git config --global alias.br branch
	git config --global core.editor "mate -w"    # 设置Editor使用textmate
	git config -l  # 列举所有配置
	
生成/添加SSH公钥
	ssh-keygen -t rsa -C "xxxxx@xxxxx.com"  [-f ~/.ssh/github]
	<!-- 将 public key 添加至项目中 -->
	cat ~/.ssh/id_rsa.pub

Git常用命令
	查看
		git show # 显示某次提交的内容
		git show $id
	
	添加
		git add <file>      # 将工作文件修改提交到本地暂存区
		git add . 			# 将所有修改过的工作文件提交暂存区
	删除
		git rm <file>       # 从版本库中删除文件
		git rm <file> --cached  # 从版本库中删除文件，但不删除文件

		git co  -- <file>   # 抛弃工作区修改
		git co  .           # 抛弃工作区修改
	重置
		git reset <file>    # 从暂存区恢复到工作文件
		git reset -- .      # 从暂存区恢复到工作文件
		git reset --hard    # 恢复最近一次提交过的状态，即放弃上次提交后的所有本次修改
		
		git revert <$id>    # 恢复某次提交的状态，恢复动作本身也创建了一次提交对象
		git revert HEAD     # 恢复最后一次提交的状态

	提交
		git ci <file>
		git ci .
		git ci -a           # 将git add, git rm和git ci等操作都合并在一起做
		git ci -am "some comments"
		git ci --amend      # 修改最后一次提交记录
	分支
		git br -r           # 查看远程分支
		git br <new_branch> # 创建新的分支
		git br -v           # 查看各个分支最后提交信息
		git br --merged     # 查看已经被合并到当前分支的分支
		git br --no-merged  # 查看尚未被合并到当前分支的分支
		
		切换分支
		
		git co <branch>     # 切换到某个分支
		git co -b <new_branch> # 创建新的分支，并且切换过去
		git co -b <new_branch> <branch>  # 基于branch创建新的new_branch
		
		git co $id          # 把某次历史提交记录checkout出来，但无分支信息，切换到其他分支会自动删除
		git co $id -b <new_branch>  # 把某次历史提交记录checkout出来，创建成一个分支

		git br -d <branch>  # 删除某个分支
		git br -D <branch>  # 强制删除某个分支 (未被合并的分支被删除的时候需要强制)
		
		分支合并
		
		git merge <branch>               # 将branch分支合并到当前分支
		git merge origin/master --no-ff  # 不要Fast-Foward合并，这样可以生成merge提交

		git rebase master <branch>       # 将master rebase到branch，相当于：
		git co <branch> && git rebase master && git co master && git merge <branch>