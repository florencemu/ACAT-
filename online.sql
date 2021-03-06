-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-09-20 11:54:31
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin_id`
--

CREATE TABLE `admin_id` (
  `admin_id` int(11) NOT NULL COMMENT '编号',
  `admin` varchar(16) COLLATE utf8_bin NOT NULL COMMENT '用户名',
  `ad_passwd` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '密码',
  `admin_group` varchar(25) COLLATE utf8_bin NOT NULL COMMENT '方向'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='管理员表';

--
-- 转存表中的数据 `admin_id`
--

INSERT INTO `admin_id` (`admin_id`, `admin`, `ad_passwd`, `admin_group`) VALUES
(1, 'huangjingwen', ',./123kohei', 'PHP'),
(2, 'baimengke', 'bmk199698', 'PHP'),
(3, 'liying', 'liying', '前端'),
(4, 'zhuangxudong', 'zhuangxudong', 'JAVA'),
(5, 'yurunyang', 'yurunyang', 'Python');

-- --------------------------------------------------------

--
-- 表的结构 `paper`
--

CREATE TABLE `paper` (
  `paper_id` int(20) NOT NULL COMMENT '试卷编号',
  `include_id` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '所含试题号',
  `paper_sum` int(255) NOT NULL COMMENT '作答人数',
  `paper_type` varchar(25) COLLATE utf8_bin NOT NULL COMMENT '试卷类型',
  `create_id` varchar(25) COLLATE utf8_bin NOT NULL COMMENT '出题人'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `paper`
--

INSERT INTO `paper` (`paper_id`, `include_id`, `paper_sum`, `paper_type`, `create_id`) VALUES
(1, '2.11.12.7.9.', 0, 'PHP', 'huangjingwen'),
(2, '2.13.1.8.10.', 0, '前端', 'liying'),
(3, '11.2.7.5.6.', 0, 'Python', 'yurunyang'),
(4, '1.3.5.7.9.', 0, 'PHP', 'baimengke'),
(5, '2.4.5.6.10.', 0, 'PHP', 'baimengke'),
(6, '6.9.11.2.5', 0, 'JAVA', 'zhuangxudong'),
(7, '7.6.5.4.3.1.', 0, 'JAVA', 'zhuangxudong'),
(8, '8.15.16.7.5.3', 0, 'Python', 'yurunyang'),
(9, '9.2.5.10.14.1', 0, '前端', 'liying');

-- --------------------------------------------------------

--
-- 表的结构 `student_info`
--

CREATE TABLE `student_info` (
  `stu_id` varchar(8) COLLATE utf8_bin NOT NULL COMMENT '学号',
  `stu_name` text COLLATE utf8_bin NOT NULL COMMENT '姓名',
  `stu_major` text COLLATE utf8_bin NOT NULL COMMENT '专业',
  `stu_group` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '组别',
  `stu_sex` text COLLATE utf8_bin COMMENT '性别',
  `stu_passwd` varchar(32) COLLATE utf8_bin NOT NULL COMMENT '密码'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='学生信息表';

--
-- 转存表中的数据 `student_info`
--

INSERT INTO `student_info` (`stu_id`, `stu_name`, `stu_major`, `stu_group`, `stu_sex`, `stu_passwd`) VALUES
('04162142', '唐莹莹', '网络1605', 'JAVA', '女', '698d51a19d8a121ce581499d7b701668'),
('04142070', '白梦柯', '网络1402', 'PHP', '男', 'bmk199698'),
('04162145', '刘欢', '网络1605', '前端', '女', '04162145'),
('04162146', '杨柯青', '网络1605', '前端', '女', '04162146'),
('04162144', '樊梦瑶', '网络1605', 'Python', '女', '04162144'),
('04162122', '胡浩东', '网络1605', 'Python', '男', '04162122'),
('04162121', '关波海', '网络1605', 'JAVA', '男', '04162121'),
('04162147', '黄静雯', '网络1605', 'PHP', '女', 'd417a1d8c302f255556802d3152227ed'),
('04162127', ' 白剑峰', '网络1605', 'PHP', '男', '6512bd43d9caa6e02c990b0a82652dca'),
('04162119', '程从越', '网络1605', 'JAVA', '男', '04162119'),
('04162120', '王雪伟', '网络1605', '前端', '男', '04162120'),
('04162123', '陈峰', '网络1605', 'PHP', '男', '04162123'),
('04162124', '舒国平', '网络1605', 'PHP', '男', '04162124'),
('04162125', '王路', '网络1605', 'PHP', '男', '04162125'),
('04162126', '刘煜昊', '网络1605', 'JAVA', '男', '04162126'),
('04162128', '周军武', '网络1605', 'JAVA', '男', ''),
('04162129', '罗铭', '网络1605', 'Python', '男', '04162129'),
('04162143', '李晶晶', '网络1605', 'PHP', '女', '04162143'),
('04162141', '赵国娟', '网络1605', 'PHP', '女', '04162141'),
('', '', '', '', NULL, 'd41d8cd98f00b204e9800998ecf8427e');

-- --------------------------------------------------------

--
-- 表的结构 `student_paper`
--

CREATE TABLE `student_paper` (
  `paper_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '试卷编号',
  `stu_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '学号',
  `stu_ans` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '学生答案',
  `base_grade` int(100) NOT NULL COMMENT '基础题得分',
  `dir_grade` int(100) NOT NULL COMMENT '方向题得分',
  `grade` int(100) NOT NULL COMMENT '总分',
  `correct_ad` varchar(20) NOT NULL COMMENT '阅卷者',
  `flag` int(11) NOT NULL COMMENT '是否批阅'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `student_paper`
--

INSERT INTO `student_paper` (`paper_id`, `stu_id`, `stu_ans`, `base_grade`, `dir_grade`, `grade`, `correct_ad`, `flag`) VALUES
('2', '04142070', 'C,B,A,D,Q,4561235456,78942313,', 40, 60, 100, 'huangjingwen', 0),
('3', '04162020', 'qedqwe,asdqwed,fdsfs,asda,df,', 1, 2, 3, 'baimengke', 0),
('1', '04162119', '1,2,3,4,5,6,7，', 40, 40, 80, 'huangjingwen', 0),
('2', '04162120', '7,6,5,4,3,2,1,', 42, 23, 75, 'huangjingwen', 0),
('3', '04162121', '5,8,6,1,2,3,5', 50, 30, 80, 'liying', 0),
('4', '04162122', 's,f,e,f,v,', 23, 54, 77, 'liying', 0),
('2', '04162123', 'asd,sdf,tghh,df,sdf,', 45, 45, 90, 'liying', 0),
('2', '04162124', 'f,werf,f3,fs,5,', 40, 45, 95, 'baimengke', 0),
('4', '04162125', 'asd,tyh,sdf,vf,g,', 31, 31, 62, 'baimengke', 0),
('5', '04162126', 'd,45,gfb,sdf,vfvf,', 31, 42, 73, 'baimengke', 0),
('5', '04162127', '阿萨德，水电费第三个，发给退回，对方感受到，河道，', 40, 43, 83, 'baimengke', 0),
('5', '04162128', 'ads,yh,dfgv,tyh,6,', 35, 46, 81, 'huangjingwen', 0),
('5', '04162129', 'asd,grh,th,dfg,d,', 45, 47, 92, 'baimengke', 0),
('2', '04162141', '如果，让人个生日，第四范式，反倒是郭德纲，色法，', 44, 32, 76, 'baimengke', 0),
('4', '04162142', 'asnd,sger,yhjtr,dsfg,gh,', 1, 2, 3, 'baijianfeng', 0),
('3', '04162143', '阿凡达，发的规划，宣传单，电饭锅，是打翻v，', 42, 53, 95, 'huangjingwen', 0),
('3', '04162144', 'A,C,D,B,asdasd,asdhjoq,', 40, 40, 80, 'baimengke', 0),
('1', '04162145', 'D,B,B,A,1234560,ashkdbaz,', 40, 40, 80, 'baimengke', 0),
('2', '04162146', 'sdfasd,asda,thgrt,sdfas,asda,', 4, 5, 6, 'baijianfeng', 0),
('1', '04162147', 'B,C,A,777,999,11111,', 45, 40, 95, 'huangjingwen', 0);

-- --------------------------------------------------------

--
-- 表的结构 `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(225) NOT NULL COMMENT '试题编号',
  `sub_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '试题类型',
  `sub_diff` int(10) NOT NULL COMMENT '试题难度',
  `sub_que` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '题目',
  `sub_ans` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '答案'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_type`, `sub_diff`, `sub_que`, `sub_ans`) VALUES
(7, 'PHP', 2, '请简述PHP的发展历史', 'PHP的原始含义：Personal Home Page  个人主页\r\n\r\n最开始是加拿大的一哥们，开发了一个在线脚本工具，用来记录有多少人访问过他的在线简历，很受欢迎，于是他就开始开发自己的工具集！\r\n\r\n\r\nPHP现在的含义：Hypetext Perprocessor 超文本预处理语言\r\n\r\n说明了PHP是预先在服务器上执行的语言（工作在服务器端），然后再把执行的结果发送给浏览器'),
(3, '前端', 2, '请简述JavaScript中document和windows分别代表什么含义？', 'ducoment代表页面对象，windows代表全局对象。'),
(0, 'PHP', 1, 'php中单引号和双引号包含字符串的区别正确的是() 　　\r\nA：单引号速度快，双引号速度慢 　　\r\nB：双引号速度快，单引号速度慢 \r\nC：单引号里面可以解析转义字符 \r\nD：双引号里面可以解析变量', 'D'),
(4, 'PHP', 3, '若x,y为整型数据，语句 $x = 1;++$x;$y =$x++;执行的$y结果为( ) 　　\r\nA：1\r\nB：2 \r\nC：3 \r\nD：0', 'D'),
(5, 'PHP', 4, '使用PHP描述冒泡排序，对象可以是一个数组', 'function bubble_sort($array){\r\n$count = count($array);\r\nif ($count <= 0) return false;\r\nfor($i=0; $i<$count; $i++){\r\nfor($j=$i; $j<$count-1; $j++){\r\nif ($array[$i] > $array[$j]){\r\n$tmp = $array[$i];\r\n$array[$i] = $array[$j];\r\n$array[$j] = $tmp;\r\n}\r\n}\r\n}\r\nreturn $array;\r\n}'),
(6, 'PHP', 5, '使用PHP描述顺序查找和二分查找（也叫做折半查找）算法，顺序查找必须考虑效率，对象可以是一个有序数组.', '//二分查找\r\n\r\nfunction bin_sch($array, $low, $high, $k){\r\nif ($low <= $high){\r\n$mid = intval(($low+$high)/2);\r\nif ($array[$mid] == $k){\r\nreturn $mid;\r\n}elseif ($k < $array[$mid]){\r\nreturn bin_sch($array, $low, $mid-1, $k);\r\n}else{\r\nreturn bin_sch($array, $mid+1, $high, $k);\r\n}\r\n}\r\nreturn -1;\r\n\r\n}\r\n\r\n//顺序查找\r\nfunction seq_sch($array, $n, $k){\r\n    $array[$n] = $k;\r\n    for($i=0; $i<$n; $i++){\r\n        if($array[$i]==$k){\r\n            break;\r\n        }\r\n    }\r\n    if ($i<$n){\r\n        return $i;\r\n    }else{\r\n        return -1;\r\n    }\r\n}\r\n'),
(1, 'JAVA', 1, 'Java中main()函数的返回值是什么()\r\nA、String \r\nB、int \r\nC、char \r\nD、void', 'D'),
(8, 'Php', 1, 'php定义变量正确的是( ) 　　 \r\nA：var a = 5;　　 \r\nB：$a = 10; 　　 \r\nC：int b = 6; \r\nD：var $a = 12; ', 'B'),
(9, 'JAVA', 2, '已知如下代码：\r\nboolean m = true;\r\nif ( m == false )\r\n    System.out.println("False");\r\nelse\r\n    System.out.println("True");\r\n执行结果是什么？\r\n\r\nA、False\r\nB、True\r\nC、None\r\nD、An error will occur when running.\r\n\r\n', 'B'),
(2, '基础题', 1, '编程题：可填在百位、十位、个位的数字都是1、2、3、4。组成所有的排列后再去掉不满足条件的排列。', 'main()\r\n{\r\nint i,j,k;\r\nprintf(“\\n“);\r\nfor(i=1;i〈5;i++)　　　　／*以下为三重循环*/\r\n　for(j=1;j〈5;j++)　\r\n　　for (k=1;k〈5;k++)\r\n　　　{\r\n　　　　if (i!=k&&i!=j&&j!=k) 　　　/*确保i、j、k三位互不相同*/\r\n　　　　printf(“%d,%d,%d\\n“,i,j,k);\r\n　　　}\r\n}'),
(11, '基础题', 3, '请问以下代码有什么问题：\r\nint main()\r\n{\r\nchar a;\r\nchar *str=&a;\r\nstrcpy(str,"hello");\r\nprintf(str);\r\nreturn 0;\r\n}', '没有为str分配内存空间，将会发生异常\r\n问题出在将一个字符串复制进一个字符变量指针所指\r\n地址。虽然可以正确输出结果，但因为越界进行内在\r\n读写而导致程序崩溃。'),
(12, '前端', 1, '12.使用FrontPage时，如果要检查网页的超链接是否正确有效，可以使用( )\r\nA.网页视图 B.超链接视图\r\nC.报表视图 D.导航视图', 'C'),
(13, '前端', 1, '简述XML的主要特征。', '(1)严密性；(2)可扩展性；(3)互操作性；(4)开放性。'),
(14, '前端', 3, '论述抖动产生的原理。', '如果采用了安全调色板以外的颜色，在Web上显示时就会产生“抖动”。抖动是由于Web安全色的限制而产生的。由于浏览器本身不能显示所有的颜色。因而伪造了那些在颜色有限的调色板中不能显示出来的颜色。在视觉上，近邻的像素倾向于混合而产生在图像中实际不存在的颜色，从而达到一种补偿目的。“抖动”的图像有很多颗粒，显得图像非常粗糙。'),
(15, 'Python', 1, '下列哪个表达式在Python中是非法的？ \r\nA.x = y = z = 1\r\nB.x = (y = z + 1)\r\nC.x, y = y, x\r\nD.x  +=  y', 'B'),
(16, 'Python', 3, '下列代码运行结果是？ \r\na = map(lambda x: x**3, [1, 2, 3])\r\nlist(a)\r\n\r\nA.[1, 6, 9]\r\nB.[1, 12, 27]\r\nC.[1, 8, 27]\r\nD.(1, 6, 9)', 'C'),
(17, 'Python', 4, '编程题：计算用户输入的内容中有几个十进制小数？几个字母？', 'content = input(">>> ")\r\n d = 0\r\n a = 0\r\n for i in content:\r\n     if i.isdecimal():\r\n         d += 1\r\n     elif i.isalpha():\r\n         a += 1\r\n print("字符串个数是：%s 十进制小数是：%s"%(a,d))'),
(19, '基础题', 1, '能正确表示逻辑关系：“a≥=10或a≤0”的C语言表达式是（    ）\r\nA. a〉＝10 or a＜＝0\r\nB. a〉＝0|a＜＝10\r\nC. a〉＝10 ＆＆a＜＝0\r\nD. a>＝10‖a＜＝0', 'D'),
(20, '基础题', 3, '递归调用非常危险，可能导致很多问题，即使程序编写没有逻辑错误，也可能导致下面哪种现象的发生（  ）\r\n(A) 死循环\r\n(B) 栈溢出\r\n(C) 内存泄漏\r\n(D) 程序停止运行', 'B'),
(21, '基础题', 5, '下列程序执行后，n的值等于(  )\r\nchar a[20];\r\nchar * p1 = (char *)a;\r\nchar * p2 = (char*)(a+5);\r\nint n= p2-p1;\r\n(A)4 \r\n(B)5  \r\n(C)10  \r\n(D)20', 'B'),
(22, '基础题', 4, '#define F(X,Y) ((X)+(Y))\r\nvoid main()\r\n{\r\nint a=3,b=4;\r\nprintf("%d\n",F(a++, b++));\r\n}\r\n程序运行后的输出结果是（  ）。\r\n(A）7   \r\n(B）8  \r\n(C）9   \r\n(D）10', 'A'),
(23, '基础题', 2, '对于语句int *px[10],以下说法正确的是（    ） 。\r\nA. px是一个指针，指向一个数组，数组的元素是整数型。\r\nB. px是一个数组，其数组的每一个元素是指向整数的指针。\r\nC. A和B均错，但它是C语言的正确语句。\r\nD. C语言不允许这样的语句。', 'B'),
(24, '基础题', 2, '以下程序的运行情况是（   ） 。\r\nmain() \r\n{    int i=1,sum=0；\r\n          while(i<10)  \r\n               sum=sum+1;  \r\n               i ++;  \r\n         printf("i=%d,sum=%d"，i,sum)；\r\n     }  \r\nA. i=10，sum=9    \r\nB. i=9,sum=9     \r\nC. i=2，sum=l     \r\nD. 以上结果都不对', 'D'),
(25, '基础题', 2, '关键字static的作用是什么？', '这个简单的问题很少有人能回答完全。在C语言中，关键字static有三个明显的作用： \r\n1). 在函数体，一个被声明为静态的变量在这一函数被调用过程中维持其值不变。 \r\n2). 在模块内（但在函数体外），一个被声明为静态的变量可以被模块内所用函数访问，但不能被模块外其它函数访问。它是一个本地的全局变量。 \r\n3). 在模块内，一个被声明为静态的函数只可被这一模块内的其它函数调用。那就是，这个函数被限制在声明它的模块的本地范围内使用。 '),
(10, '基础题', 3, '编程题;将一个数组逆序放到原来数组中，写出你认为最优的编程思路。', 'for (i = 0;i < n/2;i++)\r\n{\r\n    t = arr[i];\r\n    arr[i] = arr[n-1-i];\r\n    arr[n-1-i] = t;\r\n}'),
(26, 'PHP', 1, '你为什么想要加入PHP组，谈谈你对PHP能做些什么的理解。', '自行发挥'),
(27, 'JAVA', 1, '你为什么想要加入JAVA组，简单谈谈JAVA的分类，以及你对JAVA能做哪些开发的理解。', '略'),
(28, '前端', 1, '你为什么想要加入前端组，在你看来一名优秀的前端工程师需要具备哪些技术，你又是怎么理解这些技术的？', '略'),
(29, 'Python', 1, '你为什么想要加入Pyhton组，如果现在你可以自由发挥，你最想用Python做些什么？', '略'),
(30, 'JAVA', 1, '在Java中，一个类可同时定义许多同名的方法，这些方法的形式参数的个数、类型或顺序各不相同，传回的值也可以不相同。这种面向对象程序特性称为（）\r\nA.隐藏\r\nB.重写\r\nC.重载\r\nD.Java不支持此特性', 'C'),
(31, 'JAVA', 1, '关于抽象类和接口叙述正确的是？ ( )\r\nA.抽象类和接口都能实例化的\r\nB.抽象类不能实现接口\r\nC.抽象类方法的访问权限默认都是public\r\nD.接口方法的访问权限默认都是public', 'D'),
(32, 'Python', 1, 'Python中关于字符串下列说法错误的是\r\nA.字符应该视为长度为1的字符串\r\nB.字符串以\\0标志字符串的结束\r\nC.既可以用单引号，也可以用双引号创建字符串\r\nD.在三引号字符串中可以包含换行回车等特殊字符', 'B'),
(33, 'JAVA', 1, '在类设计中，类的成员变量要求仅仅能够被同一package下的类访问，请问应该使用下列哪个修饰词（）\r\nA.protected\r\nB.public\r\nC.private\r\nD.不需要任何修饰词', 'D'),
(34, 'JAVA', 2, '关于JAVA堆，下面说法错误的是（）？\r\nA.所有类的实例和数组都是在堆上分配内存的\r\nB.内存由存活和死亡的对象，空闲碎片区组成\r\nC.数组是分配在栈中的\r\nD.对象所占的堆内存是由自动内存管理系统回收', 'C'),
(35, 'JAVA', 1, '按照你的理解解释一下重载和重写的区别。', '重载：方法重载指的是在一个类中可以声明多个同名的方法，而方法中参数的个数或者数据类型不一致。调用这些同名的方法时，JVM会根据实际参数的不同绑定到不同的方法。\r\n重写：在继承关系中，子类的方法与父类的某一方法具有相同的方法名、返回类型和参数列表，则称子类的该方法重写(覆盖)父类的方法。'),
(36, 'JAVA', 2, '简述流的概念。', 'Java程序通过流来完成输入和输出，流是输入或输出信息的抽象。流通过Java的输入/输出系统与外设连接进行数据通信。流是抽象的对象，具体实现代码在java.io包中。'),
(37, 'JAVA', 5, '请简述GUI中实现事件监听的步骤。', '通过实现XxxListener接口或者继承XxxAdapter类实现一个事件监听器类，并对处理监听动作的方法进行重写\r\n创建事件源对象和事件监听器对象\r\n调用事件源的addXxxLisntener()方法，为事件源注册事件监听器对象'),
(38, 'JAVA', 4, '编程题：请用JAVA打印出所有的"水仙花数"，所谓"水仙花数"是指一个三位数，其各位数字立方和等于该数本身。例如：153是一个"水仙花数"，因为153=1的三次方＋5的三次方＋3的三次方。', 'public class Programme3 {\r\npublic static void main(String[] args) {\r\nint sum=0;//水仙花的总数\r\n for (inti = 100; i < 1000;i++) {\r\n   intbite=i%10;     //求得个位\r\n   intten=i/10%10;  //求得十位\r\n   inthundred=i/100;//求得百位\r\n\r\n//如果符合水仙花条件的数打印出来\r\n        if (i==(bite*bite*bite)+(ten*ten*ten)+(hundred*hundred*hundred)) {\r\n           System.out.print(i+"  ");\r\n              sum++;\r\n           }\r\n}\r\n       System.out.println("总共有水仙花个数："+sum);     \r\n   }\r\n\r\n}'),
(39, 'PHP', 1, 'PHP中可以进行输出操作的的echo，print()和print_r()有什么区别？', 'echo是一个语言结构，没有返回值。\r\nprint是一个函数，返回int类型的值[只能打印int string]。\r\nprint_r()是一个函数，返回bool类型值，按结构输出变量的值，打印关于变量的易于理解的信息[数组、对象等]'),
(40, 'PHP', 1, 'PHP支持多继承吗？', '不支持。PHP类只能继承一个父类，并用关键字“extends”标识。'),
(41, 'PHP', 1, 'PHP中的错误类型有哪些？', 'PHP中遇到的错误类型大致有3类。\r\n提示：这都是一些非常正常的信息，而非重大的错误，有些甚至不会展示给用户。比如访问不存在的变量。\r\n警告：这是有点严重的错误，将会把警告信息展示给用户，但不会影响代码的输出，比如包含一些不存在的文件。\r\n错误：这是真正的严重错误，比如访问不存在的PHP类。'),
(42, 'PHP', 1, '以下哪个SQL语句是正确的（）\r\nA：insert into users (‘p001’,’张三’,’男’); \r\nB：create table (Code int primary key); \r\nC：update users  Code=’p002’ where Code=’p001’;\r\nD：select Code as ‘代号’ from users；', 'D'),
(43, 'PHP', 2, 'php输出拼接字符串正确的是（）\r\nA echo $a+”hello”\r\nB echo $a+$b\r\nC echo $a.”hello”\r\nD echo ‘{$a}hello’', 'C'),
(44, 'PHP', 2, '下列说法正确的是：（）\r\nA. 数组的下标必须为数字，且从“0”开始\r\nB. 数组的下标可以是字符串\r\nC. 数组中的元素类型必顺一致\r\nD. 数组的下标必须是连续的', 'B'),
(45, 'PHP', 2, '以下代码输出的结果为（）\r\n$a = "cc";\r\n$cc = "dd";\r\necho  $a=="cc" ? "{$$a}":$a;\r\nA：cc \r\nB：$a\r\nC：$$a\r\nD：dd', 'D'),
(46, 'PHP', 4, '以下代码输出的结果是（A）\r\n<?php\r\n$a = 10;\r\n$b = &$a;\r\necho $b;\r\n$b = 15;\r\necho $a;\r\n?>\r\n\r\nA.1015\r\nB.1010\r\nC.1515\r\nD.1510', 'A'),
(50, '基础题', 1, '基础题:【编程题】请用C语言输出helloworld!\r\n', '#include<stdio.h>\r\nvoid main(){\r\n\r\nprintf("HelloWorld!")；\r\n}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_id`
--
ALTER TABLE `admin_id`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`paper_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `student_paper`
--
ALTER TABLE `student_paper`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin_id`
--
ALTER TABLE `admin_id`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号', AUTO_INCREMENT=224;
--
-- 使用表AUTO_INCREMENT `paper`
--
ALTER TABLE `paper`
  MODIFY `paper_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '试卷编号', AUTO_INCREMENT=30;
--
-- 使用表AUTO_INCREMENT `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(225) NOT NULL AUTO_INCREMENT COMMENT '试题编号', AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
