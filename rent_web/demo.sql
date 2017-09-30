-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 09 月 30 日 09:33
-- 服务器版本: 5.0.77
-- PHP 版本: 5.2.9-2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `demo`
--

-- --------------------------------------------------------

--
-- 表的结构 `houseseek`
--

CREATE TABLE IF NOT EXISTS `houseseek` (
  `id` int(11) NOT NULL auto_increment,
  `user_name` char(20) NOT NULL,
  `user_headimg` char(200) NOT NULL,
  `user_wechat_id` char(20) NOT NULL,
  `district` char(10) NOT NULL,
  `room_type` char(10) NOT NULL,
  `rent_type` char(11) NOT NULL,
  `view` int(10) NOT NULL,
  `follow` int(11) NOT NULL,
  `subway` char(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(500) NOT NULL,
  `addtime` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- 导出表中的数据 `houseseek`
--

INSERT INTO `houseseek` (`id`, `user_name`, `user_headimg`, `user_wechat_id`, `district`, `room_type`, `rent_type`, `view`, `follow`, `subway`, `title`, `content`, `addtime`) VALUES
(1, '小青蛙', 'http://xinquren.com/test/1/pic_people/u179.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(2, '小青蛙', 'http://xinquren.com/test/1/pic_people/u437.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(3, '小青蛙', 'http://xinquren.com/test/1/pic_people/u179.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(4, '小青蛙', 'http://xinquren.com/test/1/pic_people/u179.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(5, '小青蛙', 'http://xinquren.com/test/1/pic_people/u179.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(6, '小青蛙', 'http://xinquren.com/test/1/pic_people/u437.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(7, '小青蛙', 'http://xinquren.com/test/1/pic_people/u437.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(8, '小青蛙', 'http://xinquren.com/test/1/pic_people/u437.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(9, '小青蛙', 'http://xinquren.com/test/1/pic_people/u437.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(10, '小青蛙', 'http://xinquren.com/test/1/pic_people/u437.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(11, '小青蛙', 'http://xinquren.com/test/1/pic_people/u179.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(12, '小青蛙', 'http://xinquren.com/test/1/pic_people/u179.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(13, '小青蛙', 'http://xinquren.com/test/1/pic_people/u593.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(14, '小青蛙', 'http://xinquren.com/test/1/pic_people/u593.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(15, '小青蛙', 'http://xinquren.com/test/1/pic_people/u179.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(16, '小青蛙', 'http://xinquren.com/test/1/pic_people/u179.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(17, '小青蛙', 'http://xinquren.com/test/1/pic_people/u437.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(18, '小青蛙', 'http://xinquren.com/test/1/pic_people/u437.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(19, '小青蛙', 'http://xinquren.com/test/1/pic_people/u179.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(20, '小青蛙', 'http://xinquren.com/test/1/pic_people/u437.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(21, '小青蛙', 'http://xinquren.com/test/1/pic_people/u179.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(22, '小青蛙', 'http://xinquren.com/test/1/pic_people/u437.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(23, '小青蛙', 'http://xinquren.com/test/1/pic_people/u179.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(24, '小青蛙', 'http://xinquren.com/test/1/pic_people/u437.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(25, '小青蛙', 'http://xinquren.com/test/1/pic_people/u179.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(26, '小青蛙', 'http://xinquren.com/test/1/pic_people/u179.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(27, '小青蛙', 'http://xinquren.com/test/1/pic_people/u593.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(28, '小青蛙', 'http://xinquren.com/test/1/pic_people/u179.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(29, '小青蛙', 'http://xinquren.com/test/1/pic_people/u437.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(30, '小青蛙', 'http://xinquren.com/test/1/pic_people/u179.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(31, '小青蛙', 'http://xinquren.com/test/1/pic_people/u593.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(32, '小青蛙', 'http://xinquren.com/test/1/pic_people/u437.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489),
(33, '小青蛙', 'http://xinquren.com/test/1/pic_people/u437.jpg', 'dfdjfkljdfkjfdl', '海淀', '一室', '整租', 10, 2, '13号线', '求租海淀宏福苑小区一室一厅', '因工作调动，现在需要求租13号线西二旗附近一居室 要求干净整洁，价格接受5000-6000左右 一直拿房主的房子当自己的房子爱惜~~~ 需要找一个合租的女孩，感兴趣的就点关注吧~ 我们一起找合适的房子', 1504953489);

-- --------------------------------------------------------

--
-- 表的结构 `say`
--

CREATE TABLE IF NOT EXISTS `say` (
  `id` int(11) NOT NULL auto_increment,
  `user_name` char(20) NOT NULL,
  `userid` int(11) NOT NULL default '0',
  `cover_img` char(100) NOT NULL,
  `district` char(10) NOT NULL,
  `rent_type` char(11) NOT NULL,
  `room_type` char(10) NOT NULL,
  `area` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `view` int(10) NOT NULL,
  `want` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `addtime` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- 导出表中的数据 `say`
--

INSERT INTO `say` (`id`, `user_name`, `userid`, `cover_img`, `district`, `rent_type`, `room_type`, `area`, `price`, `view`, `want`, `content`, `addtime`) VALUES
(1, '', 1, 'http://xinquren.com/test/1/36.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953489),
(2, '', 2, 'http://xinquren.com/test/1/35.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(3, '', 1, 'http://xinquren.com/test/1/34.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953489),
(4, '', 2, 'http://xinquren.com/test/1/33.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(5, '', 1, 'http://xinquren.com/test/1/32.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953489),
(6, '', 2, 'http://xinquren.com/test/1/31.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(7, '', 1, 'http://xinquren.com/test/1/30.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953489),
(8, '', 2, 'http://xinquren.com/test/1/29.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(9, '', 1, 'http://xinquren.com/test/1/28.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953489),
(10, '', 2, 'http://xinquren.com/test/1/27.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(11, '', 1, 'http://xinquren.com/test/1/26.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953489),
(12, '', 2, 'http://xinquren.com/test/1/25.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(13, '', 2, 'http://xinquren.com/test/1/24.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(14, '', 1, 'http://xinquren.com/test/1/23.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953489),
(15, '', 2, 'http://xinquren.com/test/1/22.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(16, '', 2, 'http://xinquren.com/test/1/21.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(17, '', 1, 'http://xinquren.com/test/1/20.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953489),
(18, '', 2, 'http://xinquren.com/test/1/19.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(19, '', 1, 'http://xinquren.com/test/1/18.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953489),
(20, '', 2, 'http://xinquren.com/test/1/17.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(21, '', 1, 'http://xinquren.com/test/1/16.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953489),
(22, '', 2, 'http://xinquren.com/test/1/15.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(23, '', 1, 'http://xinquren.com/test/1/14.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953489),
(24, '', 2, 'http://xinquren.com/test/1/13.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(25, '', 1, 'http://xinquren.com/test/1/12.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953489),
(26, '', 2, 'http://xinquren.com/test/1/11.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(27, '', 1, 'http://xinquren.com/test/1/10.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953489),
(28, '', 2, 'http://xinquren.com/test/1/9.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(29, '', 1, 'http://xinquren.com/test/1/8.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953489),
(30, '', 2, 'http://xinquren.com/test/1/7.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(31, '', 1, 'http://xinquren.com/test/1/6.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '31单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953489),
(32, '', 2, 'http://xinquren.com/test/1/5.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '32单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(33, '', 1, 'http://xinquren.com/test/1/4.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '33单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953489),
(34, '', 2, 'http://xinquren.com/test/1/3.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '34单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(35, '', 1, 'http://xinquren.com/test/1/2.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '35单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953489),
(36, '', 2, 'http://xinquren.com/test/1/1.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '36单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(37, '', 1, 'http://xinquren.com/test/1/4.png', '海淀', '整租', '二室', 65, 6500, 26, 11, '37单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953489),
(38, '', 2, 'http://xinquren.com/test/1/3.png', '海淀', '整租', '二室', 65, 6500, 26, 11, '38单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953501),
(39, '', 1, 'http://xinquren.com/test/1/2.png', '海淀', '整租', '二室', 65, 6500, 26, 11, '39单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1504953489),
(40, '小青蛙biubiu', 2, 'http://xinquren.com/test/1/1498111630.jpg', '海淀', '整租', '二室', 65, 6500, 26, 11, '40单间 | 出租次卧真实手机拍照 朝南精装修包物业', 1505044568);
