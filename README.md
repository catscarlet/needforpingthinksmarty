# Need For Ping
## 简介
项目**Need For Ping**的最终版，今后所有关于Need For Ping的项目均在此项目中更新。

本项目主要用于对网络稳定性的检测，可用于对不同提供商、不同区域的虚拟主机、VPS等网络稳定性的对比。

项目工作方式是定时ping远端主机，收集丢包率和延迟，并用图表展示。

项目是靠html+php+mysql+js+bash(unix shell)编写和运行的，需要php、mysql服务和linux环境。

底层依靠shell脚本做数据的采集；界面使用一个简单的html做框架，js做ajax取数据做查询，php负责从mysql读取数据并输出json格式，最终由highcharts JS图表库进行展示 相对于之前的版本，数据保存在数据库，支持多组查询。

## 软件截图
![Need For Ping](https://github.com/catscarlet/needforpingthinksmarty/blob/master/snapshot.png)

## 安装
### 全新安装
- 需要给Public\shell下的脚本脚本手动增加运行权限，并修改安装目录

```
needforping_DIR=/var/www/html/8091/needforpingthinksmarty/Public/
```

- 修改needforping.conf中的安装目录和数据库配置

  ```
  #!/bin/sh
  PINGCOUNT=100
  DB_NAME=needforping
  DB_USER=thinkphp
  DB_PWD=PEy4cmbnenKWP4db
  DB_PREFIX=think_
  ```

- 在mysql数据库中新建数据库库think_needforping，用户名thinkphp，密码PEy4cmbnenKWP4db

  如果想修改的话，需要修改needforping.conf和Application/Home/Conf/config.php中的配置

- 导入数据库结构Public/think_needforping.sql
- 手动在crontab中添加类似：

  ```
  */2 *   * * *   root  /var/www/html/8091/needforpingthinksmarty/Public/shell/needforping.sh
  ```

### 升级
因为可能会修改数据库结构，所以本项目不保证可以支持从旧版本升级，不支持needforping各版本间升级。如需升级，请自行diff数据库结构变化。

## 配置
编辑中

## 代码组成
### Bash部分
Public\shell下的shell文件负责每2分钟向目的机ping 100个包，收集延迟和丢包率，并保存到mysql数据库中
- needforping.conf负责保存shell所需的配置参数
- needforping.sh负责读取serverlist并调用goping
- goping.sh负责收集延迟和丢包率，并保存到临时文件中
- readline.sh负责将临时文件中的数据转换成为mysql数据

### js部分
Public\js下的javascript文件负责数据查询入口和展示
- getquery.js负责ajax查询入口
- draw_LATENCY.js和draw_LOSS.js负责绘制图表框架
- draw_charts负责图表数据绘制
- [highcharts](http://www.highcharts.com/) 是开源js图表库

### php部分
Application\Home\Controller下的php文件负责数据库查询
- IndexController.class.php负责读取查询列表
- QuerydbController.class.php负责返回查询数据

### html部分
Application\Home\View\Index下的html文件负责界面展示
- index.html负责首页展示

## 项目展示
编辑中

## 已知缺陷
- 时间范围：目前以显示记录时间范围作为显示范围，也就是说如果我在最近24小时之内关机或停用此功能1小时，那么我继续查询24小时范围内数据的话，会从之前第25小时开始显示，没有数据的1小时无法体现，横坐标轴伪连续。
- 查询范围：查询范围需要修改底层php文件
- 数据库清理：数据库没有定时清理

## TODO
- 优化安装方式
- 增加cookie，每次打开页面后，直接显示上次查询的选项和结果
- 增加查询时间范围选择，修复时间范围伪连续的问题
- 模块化
- 优化页面显示
- 其他细节
