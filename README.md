# Need For Ping 3
## 简介
项目[Need For Ping 2](https://github.com/catscarlet/needforping2) 的升级版

本项目主要用于对网络稳定性的检测，可用于对不同提供商、不同区域的虚拟主机、VPS等网络稳定性的对比。

项目工作方式是定时ping远端主机，收集丢包率和延迟，并用图表展示。

项目是靠html+php+mysql+js+bash(unix shell)编写和运行的，需要php、mysql服务和linux环境。

底层依靠shell脚本做数据的采集；界面使用一个简单的html做框架，js做ajax取数据做查询，php负责从mysql读取数据并输出json格式，最终由highcharts JS图表库进行展示 相对于之前的版本，数据保存在数据库，支持多组查询。

## 软件截图
![needforping3 logo](https://github.com/catscarlet/needforping3/blob/master/snapshot.png)

## 安装
### 全新安装
- 需要给shell脚本手动增加运行权限，并且needforping3.sh和goping3.sh需要修改其所在的安装目录：

  ```
  needforping2_DIR=/var/www/needforping2
  ```

  （如有必要）readline3.sh和其他php文件需要修改数据库

  ```
  MYSQL_USER=needforping3
  MYSQL_USER_PASSWORD=5umAQXVrLUsrqW5P
  ```

- 在mysql数据库中增加库needforping3，用户名/密码:needforping35umAQXVrLUsrqW5P，

数据表pingresult

```

  mysql> show COLUMNS from pingresult;  
| Field        | Type        | Null | Key | Default | Extra          |
| id           | int(11)     | NO   | PRI | NULL    | auto_increment | | server_name  | text        | NO   |     | NULL    |                | | DATETIME     | datetime    | NO   |     | NULL    |                | | loss_percent | text        | NO   |     | NULL    |                | | rtt_min      | int(11)     | NO   |     | NULL    |                | | rtt_avg      | int(11)     | NO   |     | NULL    |                | | rtt_max      | int(11)     | NO   |     | NULL    |                | | state        | varchar(10) | YES  |     | normal  |                |
```

数据表pinglist

```
mysql> show COLUMNS from pinglist;
| Field       | Type         | Null | Key | Default | Extra          |
| id          | int(255)     | NO   | PRI | NULL    | auto_increment |
| server_name | varchar(50)  | NO   |     | NULL    |                |
| alias_name  | varchar(50)  | NO   |     | NULL    |                |
| description | varchar(255) | YES  |     | NULL    |                |
| state       | varchar(50)  | NO   |     | normal  |                |
```

- 手动在crontab中添加类似：

  ```
  _/2 _   _ _ *   root    /var/www/needforping3/shell/needforping3.sh
  ```

### 升级
本项目不支持从旧版本升级，不支持needforping3各commit版本升级。如需升级，请自行diff数据库结构变化。

## 配置
目前由query.php参数$query_range控制最大输出数据量，目前默认是半天；

```
$query_range = 360;
```

## 代码组成
### Bash部分
shell部分每2分钟向目的机ping 100个包，收集延迟和丢包率，并保存到mysql数据库中
- needforping3.sh负责读取server_list.txt
- goping3.sh负责收集延迟和丢包率，并保存到临时文件中
- readline3.sh负责将临时文件中的数据转换成为mysql数据

### js部分
负责数据查询入口和展示
- getquery.js负责ajax查询入口
- draw_LATENCY.js和draw_LOSS.js负责绘制图表框架
- draw_charts负责图表数据绘制
- [highcharts](http://www.highcharts.com/) 是开源js图表库

### php部分
负责数据库查询
- query_pinglist.php负责从pinglist表中读取服务器列表数据
- query_db.php部分负责从pingresult读取数据并输出json格式

## 项目展示
展示地址：[http://pi.catscarlet.com:8091/needforping3/](http://pi.catscarlet.com:8091/needforping3/)

这个地址是一个插在北京联通宽带上的树莓派，偶尔会关机，打不开很正常。

未来可能会提供长期稳定的demo展示地址。

## 已知缺陷
- 没有模块化：目前整个项目是完全独立的，不便于安装在其他已模块化的模板上
- 时间范围：目前以显示记录时间范围作为显示范围，也就是说如果我在最近24小时之内关机或停用此功能1小时，那么我继续查询24小时范围内数据的话，会从之前第25小时开始显示，没有数据的1小时无法体现，横坐标轴伪连续。
- 查询范围：查询范围需要修改底层php文件
- 数据库清理：数据库没有定时清理
- ping列表更新：现在需要维护两套列表，shell读取的server_list和mysql中的pinglist

## TODO
- 优化安装方式
- 增加cookie，每次打开页面后，直接显示上次查询的选项和结果
- 增加查询时间范围选择，修复时间范围伪连续的问题
- 模块化
- 优化页面显示
- 其他细节
