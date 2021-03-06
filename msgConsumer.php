<?php
    include_once("header.php");
    include_once("TaobaoHelper.php");
    include_once("XmlHelper.php");
    include_once("MsgHelper.php");
    date_default_timezone_set('Asia/Shanghai');
    
    $groups = simplexml_load_file('groups_data.xml');
    
    //获取所有的店铺
    $all_shops = simplexml_load_file('shops_data.xml');
    foreach ($all_shops as $shop) {
        $nick = (string)($shop->nick);
        $request_array[$nick] = new MFRequest($shop->sessionkey);
    }
    
    echo "启动消息监听器!\n";
    
    set_time_limit(0);
    $n=20;
     while ($n--) {
         sleep(5);
         echo "监听消息中...\n";
         
         foreach($request_array as $req){
             $resp = $req->tmcMessagesConsume();//收集消息
            
             // file_put_contents('msg.txt',$resp,FILE_APPEND);//记录消息
             if(count($resp->messages)==0) continue;
             echo "收到消息！\n";
             
             foreach($resp->messages as $tmc){
                 $msg = $tmc->tmc_message;
                 $event_nick = $msg->nick;
                 $json = XF($msg->content);
                 $event_content = json_decode($json,true);
                 $event_num_iid = $event_content['num_iid'];

                 remoteMsgConsume($msg->topic,$event_nick,$event_num_iid);
            }
         }
     }
 
    
    
    include_once("footer.php");


?>