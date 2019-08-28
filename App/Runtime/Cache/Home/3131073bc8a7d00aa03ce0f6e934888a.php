<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="applicable-device" content="pc,mobile" />
    <meta name="MobileOptimized" content="width" />
    <meta name="HandheldFriendly" content="true" />

    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>
        <?php echo ($answer['uname']); ?>-<?php echo ($wenjuan['name']); ?>-
        保礼街
    </title>
    <meta name="keywords" content="保礼街">
    <meta name="description" content="保礼街">
    <link rel="shortcut icon" type="image/x-icon" href="/Public/Home/default/images/favicon.ico" media="screen" />
    <script type="text/javascript" src="/Public/Home/default/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Home/default/js/jsAddress.js"></script>
    <script src="/Public/Home/default/js/laydate/laydate.js"></script> <!-- 改成你的路径 -->
    <link href="/Public/Home/default/css/wenjuan.css" rel="stylesheet">
</head>

<body>
    <div class="wjContent clear">
        <div class="head_div">
            <?php if($wenjuan.pic): ?><img alt="<?php echo ($v["name"]); ?>" src="/uploads//<?php echo ($wenjuan["pic"]); ?>" class="header_img"><?php endif; ?>
        </div>
        <div class="content">
            <div class="wjtitle ">
                <h1 <?php if($wenjuan.name_style): ?>style="<?php echo ($wenjuan["name_style"]); ?>"<?php endif; ?>>
                    <?php echo ($wenjuan["name"]); ?>
                </h1>
                <h2 style="text-align: right;padding-right: 50px;padding-bottom: 12px;color:#666666;font-size:16px;">
                    应答时间：<?php echo (date("Y-m-d H:i:s",$answer["addtime"])); ?>
                </h2>
            </div>
            <div class="wjintro  desc_begin">
                <?php echo ($wenjuan["des"]); ?>
            </div>
            <div class="wjhr "></div>
            <div class="question_div information">
                <ul>
                    <?php if($answer['uname']): ?><li><label>姓 名：</label><input type="text" name="uname" id="uname" value="<?php echo ($answer["uname"]); ?>"/></li><?php endif; ?>

                    <?php if($answer['phone']): ?><li><label>手机号：</label><input type="text" name="phone" id="phone"  value="<?php echo ($answer["phone"]); ?>"/></li><?php endif; ?>
                    <?php if($answer['address']): ?><li><label>联系地址：</label><input type="text" name="address" id="address"  value="<?php echo ($answer["address"]); ?>"/></li><?php endif; ?>
                    <?php if($answer['dep']): ?><li><label>邀请人：</label><input type="text" name="dep" id="dep"  value="<?php echo ($answer["dep"]); ?>"/></li><?php endif; ?>

                    <input type="hidden" name="wenjuan_id" value="<?php echo ($wenjuan["id"]); ?>" id="wenjuan_id" />
                    <input type="hidden" name="qa_cnt" value="<?php echo ($qa_cnt); ?>" id="qa_cnt" />
                </ul>

                <ul>
                    <?php if($answer['txt1']): ?><li><label>备选1：</label><input type="text" name="txt1" id="txt1" value="<?php echo ($answer["txt1"]); ?>"/></li><?php endif; ?>
                    <?php if($answer['txt2']): ?><li><label>备选2：</label><input type="text" name="txt1" id="txt2" value="<?php echo ($answer["txt2"]); ?>"/></li><?php endif; ?>
                    <?php if($answer['txt3']): ?><li><label>备选3：</label><input type="text" name="txt1" id="txt3" value="<?php echo ($answer["txt3"]); ?>"/></li><?php endif; ?>
                    <?php if($answer['txt4']): ?><li><label>备选4：</label><input type="text" name="txt1" id="txt4" value="<?php echo ($answer["txt4"]); ?>"/></li><?php endif; ?>
                    <?php if($answer['txt5']): ?><li><label>备选5：</label><input type="text" name="txt5" id="txt5" value="<?php echo ($answer["txt5"]); ?>"/></li><?php endif; ?>
                    <?php if($answer['txt6']): ?><li><label>备选6：</label><input type="text" name="txt6" id="txt6" value="<?php echo ($answer["txt6"]); ?>"/></li><?php endif; ?>
                </ul>

            </div>

            <div id="q_div">
            <?php if(is_array($info_list)): foreach($info_list as $k=>$v): ?><!--单选-->
                <?php if($v["q_type"] == 1): ?><div class="question_div <?php if($v["display_sort"] == 3): ?>Tworow<?php else: ?>Onerow<?php endif; ?>">
                        <?php if($v.tips): if(substr($v['tips'],0,1)=="|"){ ?>
                            <h2 class="bigTitle" <?php if($wenjuan.one_title_style): ?>style="<?php echo ($wenjuan["one_title_style"]); ?>"<?php endif; ?>><?php echo (substr($v["tips"],1)); ?></h2>
                            <?php }else{ ?>
                            <p class="smallTitle" <?php if($wenjuan.two_title_style): ?>style="<?php echo ($wenjuan["two_title_style"]); ?>"<?php endif; ?>><?php echo ($v["tips"]); ?></p>
                            <?php } endif; ?>
                        <div class="title" <?php if($wenjuan.title_style): ?>style="<?php echo ($wenjuan["title_style"]); ?>"<?php endif; ?>><span class="Qnum"><?php echo ($k+1); ?>.</span> <span><?php echo ($v["name"]); ?></span></div>
                        <div class="answer" <?php if($wenjuan.answer_style): ?>style="<?php echo ($wenjuan["answer_style"]); ?>"<?php endif; ?>>
                            <ul>
                                <?php $an_arr=explode("|",$v['content']);?>
                                <?php if(is_array($an_arr)): foreach($an_arr as $key=>$an): $tmp_flag=array_key_exists($v['id'],$qa_list); if($tmp_flag){ $tmp_flag=$an==$qa_list[$v['id']]?true:false; } ?>
                                    <li><input type="radio" key="<?php echo ($k+1); ?>" name="qa[<?php echo ($v["id"]); ?>]" value="<?php echo ($an); ?>" <?php if($tmp_flag): ?>checked="checked"<?php endif; ?> class="option"><?php echo ($an); ?></li><?php endforeach; endif; ?>
                            </ul>
                        </div>
                    </div><?php endif; ?>
                <!--多选-->
                <?php if($v["q_type"] == 2): ?><div class="question_div <?php if($v["display_sort"] == 3): ?>Tworow<?php else: ?>Onerow<?php endif; ?>">
                        <?php if($v.tips): if(substr($v['tips'],0,1)=="|"){ ?>
                            <h2 class="bigTitle" <?php if($wenjuan.one_title_style): ?>style="<?php echo ($wenjuan["one_title_style"]); ?>"<?php endif; ?>><?php echo (substr($v["tips"],1)); ?></h2>
                            <?php }else{ ?>
                            <p class="smallTitle" <?php if($wenjuan.two_title_style): ?>style="<?php echo ($wenjuan["two_title_style"]); ?>"<?php endif; ?>><?php echo ($v["tips"]); ?></p>
                            <?php } endif; ?>
                        <div class="title" <?php if($wenjuan.title_style): ?>style="<?php echo ($wenjuan["title_style"]); ?>"<?php endif; ?>><span class="Qnum"><?php echo ($k+1); ?>.</span> <span><?php echo ($v["name"]); ?></span></div>
                        <div class="answer" <?php if($wenjuan.answer_style): ?>style="<?php echo ($wenjuan["answer_style"]); ?>"<?php endif; ?>>
                            <ul>
                                <?php $an_arr=explode("|",$v['content']);?>
                                <?php if(is_array($an_arr)): foreach($an_arr as $key=>$an): $tmp_flag=array_key_exists($v['id'],$qa_list); if($tmp_flag){ $tmp_flag=$an==$qa_list[$v['id']]?true:false; } ?>
                                    <li><input type="checkbox" key="<?php echo ($k+1); ?>"  name="qa[<?php echo ($v["id"]); ?>]" value="<?php echo ($an); ?>" <?php if($tmp_flag): ?>checked="checked"<?php endif; ?>  class="option"><?php echo ($an); ?></li><?php endforeach; endif; ?>
                            </ul>
                        </div>
                    </div><?php endif; ?>

                <!--单行文本-->
                <?php if($v["q_type"] == 3): ?><div class="question_div  <?php if($v["display_sort"] == 1): ?>Lefttitle<?php else: endif; ?>">
                        <?php if($v.tips): if(substr($v['tips'],0,1)=="|"){ ?>
                            <h2 class="bigTitle" <?php if($wenjuan.one_title_style): ?>style="<?php echo ($wenjuan["one_title_style"]); ?>"<?php endif; ?>><?php echo (substr($v["tips"],1)); ?></h2>
                            <?php }else{ ?>
                            <p class="smallTitle" <?php if($wenjuan.two_title_style): ?>style="<?php echo ($wenjuan["two_title_style"]); ?>"<?php endif; ?>><?php echo ($v["tips"]); ?></p>
                            <?php } endif; ?>

                        <div class="title" <?php if($wenjuan.title_style): ?>style="<?php echo ($wenjuan["title_style"]); ?>"<?php endif; ?>><span class="Qnum"><?php echo ($k+1); ?>.</span> <span><?php echo ($v["name"]); ?></span></div>
                        <div class="answer" <?php if($wenjuan.answer_style): ?>style="<?php echo ($wenjuan["answer_style"]); ?>"<?php endif; ?>>
                            <?php if($v.prev): ?><label><?php echo ($v["prev"]); ?></label><?php endif; ?>
                                    <?php
 $tmp_flag=array_key_exists($v['id'],$qa_list); if($tmp_flag){ $tmp_flag=$qa_list[$v['id']]; } ?>
                            <input type="text" key="<?php echo ($k+1); ?>"  name="qa[<?php echo ($v["id"]); ?>]" value="<?php echo ($tmp_flag); ?>" class="option">
                            <?php if($v.next): ?><label><?php echo ($v["next"]); ?></label><?php endif; ?>
                        </div>
                    </div><?php endif; ?>

                <!--填空-->
                <?php if($v["q_type"] == 5): ?><div class="question_div  <?php if($v["display_sort"] == 1): ?>Lefttitle<?php else: endif; ?> blanks">
                        <?php if($v.tips): if(substr($v['tips'],0,1)=="|"){ ?>
                            <h2 class="bigTitle" <?php if($wenjuan.one_title_style): ?>style="<?php echo ($wenjuan["one_title_style"]); ?>"<?php endif; ?>><?php echo (substr($v["tips"],1)); ?></h2>
                            <?php }else{ ?>
                            <p class="smallTitle" <?php if($wenjuan.two_title_style): ?>style="<?php echo ($wenjuan["two_title_style"]); ?>"<?php endif; ?>><?php echo ($v["tips"]); ?></p>
                            <?php } endif; ?>
                        <div class="title" <?php if($wenjuan.title_style): ?>style="<?php echo ($wenjuan["title_style"]); ?>"<?php endif; ?>><span class="Qnum"><?php echo ($k+1); ?>.</span> <span><?php echo ($v["name"]); ?></span></div>
                        <div class="answer" <?php if($wenjuan.answer_style): ?>style="<?php echo ($wenjuan["answer_style"]); ?>"<?php endif; ?>>
                            <?php if($v.prev): ?><label><?php echo ($v["prev"]); ?></label><?php endif; ?>
                    <?php
 $tmp_flag=array_key_exists($v['id'],$qa_list); if($tmp_flag){ $tmp_flag=$qa_list[$v['id']]; } ?>
                            <input type="text" key="<?php echo ($k+1); ?>"  name="qa[<?php echo ($v["id"]); ?>]" value="<?php echo ($tmp_flag); ?>" class="option">
                            <?php if($v.next): ?><label><?php echo ($v["next"]); ?></label><?php endif; ?>
                        </div>
                    </div><?php endif; ?>
                <!--多行文本-->
                <?php if($v["q_type"] == 6): ?><div class="question_div matrix <?php if($v["display_sort"] == 1): ?>Lefttitle<?php else: endif; ?>">
                        <?php if($v.tips): if(substr($v['tips'],0,1)=="|"){ ?>
                            <h2 class="bigTitle" <?php if($wenjuan.one_title_style): ?>style="<?php echo ($wenjuan["one_title_style"]); ?>"<?php endif; ?>><?php echo (substr($v["tips"],1)); ?></h2>
                            <?php }else{ ?>
                            <p class="smallTitle" <?php if($wenjuan.two_title_style): ?>style="<?php echo ($wenjuan["two_title_style"]); ?>"<?php endif; ?>><?php echo ($v["tips"]); ?></p>
                            <?php } endif; ?>
                        <div class="title" <?php if($wenjuan.title_style): ?>style="<?php echo ($wenjuan["title_style"]); ?>"<?php endif; ?>><span class="Qnum"><?php echo ($k+1); ?>.</span> <span><?php echo ($v["name"]); ?></span></div>
                        <div class="answer" <?php if($wenjuan.answer_style): ?>style="<?php echo ($wenjuan["answer_style"]); ?>"<?php endif; ?>>
                                    <?php
 $tmp_flag=array_key_exists($v['id'],$qa_list); if($tmp_flag){ $tmp_flag=$qa_list[$v['id']]; } ?>
                            <textarea rows="3"  key="<?php echo ($k+1); ?>"  name="qa[<?php echo ($v["id"]); ?>]"  cols="40"><?php echo ($tmp_flag); ?></textarea>
                        </div>
                    </div><?php endif; ?>

                <!--下拉框-->
                <?php if($v["q_type"] == 13): ?><div class="question_div matrix <?php if($v["display_sort"] == 1): ?>Lefttitle<?php else: endif; ?>">
                        <?php if($v.tips): if(substr($v['tips'],0,1)=="|"){ ?>
                            <h2 class="bigTitle" <?php if($wenjuan.one_title_style): ?>style="<?php echo ($wenjuan["one_title_style"]); ?>"<?php endif; ?>><?php echo (substr($v["tips"],1)); ?></h2>
                            <?php }else{ ?>
                            <p class="smallTitle" <?php if($wenjuan.two_title_style): ?>style="<?php echo ($wenjuan["two_title_style"]); ?>"<?php endif; ?>><?php echo ($v["tips"]); ?></p>
                            <?php } endif; ?>
                        <div class="title" <?php if($wenjuan.title_style): ?>style="<?php echo ($wenjuan["title_style"]); ?>"<?php endif; ?>><span class="Qnum"><?php echo ($k+1); ?>.</span> <span><?php echo ($v["name"]); ?></span></div>
                        <div class="answer" <?php if($wenjuan.answer_style): ?>style="<?php echo ($wenjuan["answer_style"]); ?>"<?php endif; ?>>
                            <?php if($v.prev): ?><label><?php echo ($v["prev"]); ?></label><?php endif; ?>
                            <select name="qa[<?php echo ($v["id"]); ?>]"  key="<?php echo ($k+1); ?>" >
                                <?php $an_arr=explode("|",$v['content']);?>
                                <?php if(is_array($an_arr)): foreach($an_arr as $key=>$an): $tmp_flag=array_key_exists($v['id'],$qa_list); if($tmp_flag){ $tmp_flag=$an==$qa_list[$v['id']]?true:false; } ?>
                                    <option value="<?php echo ($an); ?>" <?php if($tmp_flag): ?>selected="selected"<?php endif; ?>><?php echo ($an); ?></option><?php endforeach; endif; ?>
                            </select>
                            <?php if($v.next): ?><label><?php echo ($v["next"]); ?></label><?php endif; ?>
                        </div>
                    </div><?php endif; ?>
                <!---评分-->
                <?php if($v["q_type"] == 9): ?><div class="question_div matrix <?php if($v["display_sort"] == 1): ?>Lefttitle<?php else: endif; ?>">
                        <?php if($v.tips): if(substr($v['tips'],0,1)=="|"){ ?>
                            <h2 class="bigTitle" <?php if($wenjuan.one_title_style): ?>style="<?php echo ($wenjuan["one_title_style"]); ?>"<?php endif; ?>><?php echo (substr($v["tips"],1)); ?></h2>
                            <?php }else{ ?>
                            <p class="smallTitle" <?php if($wenjuan.two_title_style): ?>style="<?php echo ($wenjuan["two_title_style"]); ?>"<?php endif; ?>><?php echo ($v["tips"]); ?></p>
                            <?php } endif; ?>
                        <div class="title" <?php if($wenjuan.title_style): ?>style="<?php echo ($wenjuan["title_style"]); ?>"<?php endif; ?>><span class="Qnum"><?php echo ($k+1); ?>.</span> <span><?php echo ($v["name"]); ?></span></div>
                        <div class="answer" <?php if($wenjuan.answer_style): ?>style="<?php echo ($wenjuan["answer_style"]); ?>"<?php endif; ?>>
                            <div class="rating-box text-center">
                                <?php if($v.prev): ?><label><?php echo ($v["prev"]); ?></label><?php endif; ?>
                                    <?php
 $tmp_flag=array_key_exists($v['id'],$qa_list); if($tmp_flag){ $tmp_flag=$qa_list[$v['id']]; }else{ $tmp_flag=0; } ?>
                                <section class="rating" key="<?php echo ($v["id"]); ?>" >
                                    <span <?php if($tmp_flag > 4): ?>class="active"<?php endif; ?>>☆</span>
                                    <span <?php if($tmp_flag > 3): ?>class="active"<?php endif; ?>>☆</span>
                                    <span <?php if($tmp_flag > 2): ?>class="active"<?php endif; ?>>☆</span>
                                    <span <?php if($tmp_flag > 1): ?>class="active"<?php endif; ?>>☆</span>
                                    <span <?php if($tmp_flag > 0): ?>class="active"<?php endif; ?>>☆</span>
                                </section>
                                <input type="hidden" value="<?php echo ($tmp_flag); ?>"  key="<?php echo ($k+1); ?>" id="qa_hidden_<?php echo ($v["id"]); ?>" name="qa[<?php echo ($v["id"]); ?>]"/>
                                <?php if($v.next): ?><label><?php echo ($v["next"]); ?></label><?php endif; ?>
                            </div>

                        </div>
                    </div><?php endif; ?>

                <!--日期选择-->
                <?php if($v["q_type"] == 8): ?><div class="question_div  <?php if($v["display_sort"] == 1): ?>Lefttitle<?php else: endif; ?>">
                        <?php if($v.tips): if(substr($v['tips'],0,1)=="|"){ ?>
                            <h2 class="bigTitle" <?php if($wenjuan.one_title_style): ?>style="<?php echo ($wenjuan["one_title_style"]); ?>"<?php endif; ?>><?php echo (substr($v["tips"],1)); ?></h2>
                            <?php }else{ ?>
                            <p class="smallTitle" <?php if($wenjuan.two_title_style): ?>style="<?php echo ($wenjuan["two_title_style"]); ?>"<?php endif; ?>><?php echo ($v["tips"]); ?></p>
                            <?php } endif; ?>
                        <div class="title" <?php if($wenjuan.title_style): ?>style="<?php echo ($wenjuan["title_style"]); ?>"<?php endif; ?>><span class="Qnum"><?php echo ($k+1); ?>.</span> <span><?php echo ($v["name"]); ?></span></div>
                        <div class="answer" <?php if($wenjuan.answer_style): ?>style="<?php echo ($wenjuan["answer_style"]); ?>"<?php endif; ?>>
                            <?php if($v.prev): ?><label><?php echo ($v["prev"]); ?></label><?php endif; ?>
                                <?php
 $tmp_flag=array_key_exists($v['id'],$qa_list); if($tmp_flag){ $tmp_flag=$qa_list[$v['id']]; } ?>
                            <input type="text" class="demo-input" placeholder="请选择日期" value="<?php echo ($tmp_flag); ?>" name="qa[<?php echo ($v["id"]); ?>]"  id="qa_<?php echo ($v["id"]); ?>"  key="<?php echo ($k+1); ?>" >
                            <script>
                                //执行一个laydate实例
                                laydate.render({
                                    elem: '#qa_<?php echo ($v["id"]); ?>' //指定元素
                                });
                            </script>
                            <?php if($v.next): ?><label><?php echo ($v["next"]); ?></label><?php endif; ?>
                        </div>
                    </div><?php endif; endforeach; endif; ?>
            </div>

    <div class="question_div Onerow">
        <div class="title" <?php if($wenjuan.title_style): ?>style="<?php echo ($wenjuan["title_style"]); ?>"<?php endif; ?>>
        <span>
            <?php if($wenjuan["tjkh_desc"] != null): echo ($wenjuan["tjkh_desc"]); ?>
                <?php else: ?>
                您是否可以再提供三位朋友，帮助理财顾问完成考核。<?php endif; ?>
        </span>
    </div>
    </div>
    <div class="question_div information">
        <ul>
            <li><label>姓 名：</label><input type="text" name="khname1" id="khname1" value="<?php echo ($answer["khname1"]); ?>"/></li>
            <li><label>电话：</label><input type="text" name="khtel1" id="khtel1"  value="<?php echo ($answer["khtel1"]); ?>"/></li>
        </ul>
    </div>
    <div class="question_div information">
        <ul>
            <li><label>姓 名：</label><input type="text" name="khname2" id="khname2" value="<?php echo ($answer["khname2"]); ?>"/></li>
            <li><label>电话：</label><input type="text" name="khtel2" id="khtel2"  value="<?php echo ($answer["khtel2"]); ?>"/></li>
        </ul>
    </div>
    <div class="question_div information">
        <ul>
            <li><label>姓 名：</label><input type="text" name="khname3" id="khname3" value="<?php echo ($answer["khname3"]); ?>"/></li>
            <li><label>电话：</label><input type="text" name="khtel3" id="khtel3"  value="<?php echo ($answer["khtel3"]); ?>"/></li>
        </ul>
    </div>

            <div class="tips ">
                <span>注:</span>
                <?php $tips_arr=explode("|||",$wenjuan['tips']);?>
                <?php if(is_array($tips_arr)): foreach($tips_arr as $key=>$vv): echo ($vv); ?><br><?php endforeach; endif; ?>
            </div>
        </div>

    </div>

<script>
    $(function () {

    })

</script>
</body>
</html>