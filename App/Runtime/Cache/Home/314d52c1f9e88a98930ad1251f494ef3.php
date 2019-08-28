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
        <?php echo ($wenjuan['name']); ?>-
        保礼街
    </title>
    <meta name="keywords" content="保礼街">
    <meta name="description" content="保礼街">
    <link rel="shortcut icon" type="image/x-icon" href="/Public/Home/default/images/favicon.ico" media="screen" />
    <script type="text/javascript" src="/Public/Home/default/js/jquery.min.js"></script>
    <script src="/Public/Home/default/js/laydate/laydate.js"></script> <!-- 改成你的路径 -->
    <link href="/Public/Home/default/css/wenjuan.css" rel="stylesheet">
</head>

<body>
<form method='post' id="form_do" name="form_do" action="<?php echo U('Wenjuan/save');?>">
    <div class="wjContent clear">
        <div class="head_div">
            <?php if($wenjuan.pic): ?><img alt="<?php echo ($v["name"]); ?>" src="/uploads//<?php echo ($wenjuan["pic"]); ?>" class="header_img"><?php endif; ?>
        </div>
        <div class="content">
            <div class="wjtitle ">
                <h1 <?php if($wenjuan.name_style): ?>style="<?php echo ($wenjuan["name_style"]); ?>"<?php endif; ?>>
                    <?php echo ($wenjuan["name"]); ?>
                </h1>
            </div>
            <div class="wjintro  desc_begin">
                <?php echo ($wenjuan["des"]); ?>
            </div>
            <div class="wjhr "></div>
            <div class="question_div information">
                <ul>
                    <li><label>姓 名：</label><input type="text" name="uname" id="uname" value=""/></li>
                    <li><label>手机号：</label><input type="text" name="phone" id="phone"  value=""/></li>
                    <li><label>联系地址：</label><input type="text" name="address" id="address"  value=""/></li>
                    <li><label>邀请人：</label><input type="text" name="dep" id="dep"  value=""/></li>
                    <input type="hidden" name="wenjuan_id" value="<?php echo ($wenjuan["id"]); ?>" id="wenjuan_id" />
                    <input type="hidden" name="qa_cnt" value="<?php echo ($qa_cnt); ?>" id="qa_cnt" />
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
                                <?php if(is_array($an_arr)): foreach($an_arr as $key=>$an): ?><li><input type="radio" key="<?php echo ($k+1); ?>" name="qa[<?php echo ($v["id"]); ?>]" value="<?php echo ($an); ?>" class="option"><?php echo ($an); ?></li><?php endforeach; endif; ?>
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
                                <?php if(is_array($an_arr)): foreach($an_arr as $key=>$an): ?><li><input type="checkbox" key="<?php echo ($k+1); ?>"  name="qa[<?php echo ($v["id"]); ?>]" value="<?php echo ($an); ?>" class="option"><?php echo ($an); ?></li><?php endforeach; endif; ?>
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
                            <input type="text" key="<?php echo ($k+1); ?>"  name="qa[<?php echo ($v["id"]); ?>]" value="" class="option">
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
                            <input type="text" key="<?php echo ($k+1); ?>"  name="qa[<?php echo ($v["id"]); ?>]" value="" class="option">
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
                            <textarea rows="3"  key="<?php echo ($k+1); ?>"  name="qa[<?php echo ($v["id"]); ?>]"  cols="40"></textarea>
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
                                <?php if(is_array($an_arr)): foreach($an_arr as $key=>$an): ?><option value="<?php echo ($an); ?>"><?php echo ($an); ?></option><?php endforeach; endif; ?>
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
                                <section class="rating" key="<?php echo ($v["id"]); ?>" >
                                    <span class="">☆</span>
                                    <span>☆</span>
                                    <span>☆</span>
                                    <span>☆</span>
                                    <span>☆</span>
                                </section>
                                <input type="hidden" value=""  key="<?php echo ($k+1); ?>" id="qa_hidden_<?php echo ($v["id"]); ?>" name="qa[<?php echo ($v["id"]); ?>]"/>
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
                            <input type="text" class="demo-input" placeholder="请选择日期" name="qa[<?php echo ($v["id"]); ?>]"  id="qa_<?php echo ($v["id"]); ?>"  key="<?php echo ($k+1); ?>" >
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
            <li><label>姓 名：</label><input type="text" name="khname1" id="khname1" value=""/></li>
            <li><label>电话：</label><input type="text" name="khtel1" id="khtel1"  value=""/></li>
        </ul>
    </div>
    <div class="question_div information">
        <ul>
            <li><label>姓 名：</label><input type="text" name="khname2" id="khname2" value=""/></li>
            <li><label>电话：</label><input type="text" name="khtel2" id="khtel2"  value=""/></li>
        </ul>
    </div>
    <div class="question_div information">
        <ul>
            <li><label>姓 名：</label><input type="text" name="khname3" id="khname3" value=""/></li>
            <li><label>电话：</label><input type="text" name="khtel3" id="khtel3"  value=""/></li>
        </ul>
    </div>

            <div class="tips ">
                <span>注:</span>
                <?php $tips_arr=explode("|||",$wenjuan['tips']);?>
                <?php if(is_array($tips_arr)): foreach($tips_arr as $key=>$vv): echo ($vv); ?><br><?php endforeach; endif; ?>
            </div>

        </div>

    </div>
</form>

<script>
    $(function () {
        $('.rating > span').on('click', function () {
            $(this).prevAll('span').removeClass('active');
            $(this).addClass('active').nextAll('span').addClass('active');
            var s=0;
            $(".rating >span").each(function () {
                if($(this).hasClass("active")){
                    s=s+1
                }
            })

            var id="qa_hidden_"+$(this).parent('.rating').attr('key');
            $("#"+id).val(s);
        })
    })
</script>
</body>
</html>