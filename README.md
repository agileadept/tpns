## 概述
[腾讯移动推送](https://cloud.tencent.com/product/tpns) 是腾讯云提供的一款支持**百亿级**消息的移动App推送平台，开发者可以调用php SDK访问腾讯移动推送服务。

## 使用说明
1. 接口和参数，可以参看[官网](https://cloud.tencent.com/document/product/548/39060) ，注意，本代码只支持推送接口。

2. 全量推送
   ```
   <?php
       use Agileadept\Tpns\AndroidMessage;
       use Agileadept\Tpns\iOSMessage;
       use Agileadept\Tpns\Message;
       use Agileadept\Tpns\Request;
       use Agileadept\Tpns\Stub;
       use Agileadept\Tpns\Tpns;

        //$android = new AndroidMessage;
        //$android->n_ch_id = "chid";

        $ios = new iOSMessage;
        $ios->custom = "{\"key\":\"value\"}";

        $tpns = new Tpns();
        $req = $tpns->NewRequest(
            $tpns->WithAudienceType(Tpns::AUDIENCE_ALL),
            $tpns->WithMessageType(Tpns::MESSAGE_NOTIFY),
            $tpns->WithTitle("this-title"),
            $tpns->WithContent("this-content"),
            $tpns->WithThreadId("tid"),
            //$tpns->WithAndroidMessage($android),
            $tpns->WithIOSMessage($ios),
            $tpns->WithEnvironment(Tpns::ENVIRONMENT_PROD)
        );

        //@parameter: accessId=123456, secretKey="abcdef", host="api.tpns.tencent.com"
        $stub = new Stub(123456, "abcdef", Tpns::GUANGZHOU);
        $result = $stub->Push($req);
        var_dump($result);

   ```

3. 单设备推送
   ```
   <?php
       use Agileadept\Tpns\AndroidMessage;
       use Agileadept\Tpns\iOSMessage;
       use Agileadept\Tpns\Message;
       use Agileadept\Tpns\Request;
       use Agileadept\Tpns\Stub;
       use Agileadept\Tpns\Tpns;
   
       //$android = new AndroidMessage;
       //$android->n_ch_id = "chid";

        $ios = new iOSMessage;
        $ios->custom = "{\"key\":\"value\"}";

        $tpns = new Tpns();
        $req = $tpns->NewRequest(
            $tpns->WithAudienceType(Tpns::AUDIENCE_TOKEN),
            $tpns->WithMessageType(Tpns::MESSAGE_NOTIFY),
            $tpns->WithTitle("this-title"),
            $tpns->WithContent("this-content"),
            //$tpns->WithAndroidMessage($android),
            $tpns->WithIOSMessage($ios),
            $tpns->WithTokenList(array("abc")),
            $tpns->WithEnvironment(Tpns::ENVIRONMENT_PROD)
        );

        //@parameter: accessId=123456, secretKey="abcdef", host="api.tpns.tencent.com"
        $stub = new Stub(123456, "abcdef", Tpns::GUANGZHOU);
        $result = $stub->Push($req);
        var_dump($result);

   ```
4. 设备列表推送
   ```
   <?php
       use Agileadept\Tpns\AndroidMessage;
       use Agileadept\Tpns\iOSMessage;
       use Agileadept\Tpns\Message;
       use Agileadept\Tpns\Request;
       use Agileadept\Tpns\Stub;
       use Agileadept\Tpns\Tpns;
   
       //$android = new AndroidMessage;
       //$android->n_ch_id = "chid";

        $ios = new iOSMessage;
        $ios->custom = "{\"key\":\"value\"}";

        $tpns = new Tpns();
        $req = $tpns->NewRequest(
            $tpns->WithAudienceType(Tpns::AUDIENCE_TOKEN_LIST),
            $tpns->WithMessageType(Tpns::MESSAGE_NOTIFY),
            $tpns->WithTitle("this-title"),
            $tpns->WithContent("this-content"),
            //$tpns->WithAndroidMessage($android),
            $tpns->WithIOSMessage($ios),
            $tpns->WithTokenList(array("abc", "def", "hijk")),
            $tpns->WithEnvironment(Tpns::ENVIRONMENT_PROD)
        );

        //@parameter: accessId=123456, secretKey="abcdef", host="api.tpns.tencent.com"
        $stub = new Stub(123456, "abcdef", Tpns::GUANGZHOU);
        $result = $stub->Push($req);
        var_dump($result);

   ``` 

5. 单账号推送
   ```
   <?php
       use Agileadept\Tpns\AndroidMessage;
       use Agileadept\Tpns\iOSMessage;
       use Agileadept\Tpns\Message;
       use Agileadept\Tpns\Request;
       use Agileadept\Tpns\Stub;
       use Agileadept\Tpns\Tpns;

       //$android = new AndroidMessage;
       //$android->n_ch_id = "chid";
                       
       $ios = new iOSMessage;
       $ios->custom = "{\"key\":\"value\"}";
   
       $tpns = new Tpns();                            
       $req = $tpns->NewRequest(
           $tpns->WithAudienceType(Tpns::AUDIENCE_ACCOUNT),
           $tpns->WithMessageType(Tpns::MESSAGE_NOTIFY),
           $tpns->WithTitle("this-title"),
           $tpns->WithContent("this-content"),
           //$tpns->WithAndroidMessage($android),
           $tpns->WithIOSMessage($ios),
           $tpns->WithAccountList(array("account1")),
           $tpns->WithEnvironment(Tpns::ENVIRONMENT_PROD)
       );
       
       //@parameter: accessId=123456, secretKey="abcdef", host="api.tpns.tencent.com"
       $stub = new Stub(123456, "abcdef", Tpns::GUANGZHOU);
       $result = $stub->Push($req);
       var_dump($result);
 
   ```  
    
6. 账号列表推送
   ```
   <?php
       use Agileadept\Tpns\AndroidMessage;
       use Agileadept\Tpns\iOSMessage;
       use Agileadept\Tpns\Message;
       use Agileadept\Tpns\Request;
       use Agileadept\Tpns\Stub;
       use Agileadept\Tpns\Tpns;

       //$android = new AndroidMessage;
       //$android->n_ch_id = "chid";
                       
       $ios = new iOSMessage;
       $ios->custom = "{\"key\":\"value\"}";
       
       $tpns = new Tpns();                            
       $req = $tpns->NewRequest(
           $tpns->WithAudienceType(Tpns::AUDIENCE_ACCOUNT_LIST),
           $tpns->WithMessageType(Tpns::MESSAGE_NOTIFY),
           $tpns->WithTitle("this-title"),
           $tpns->WithContent("this-content"),
           //$tpns->WithAndroidMessage($android),
           $tpns->WithIOSMessage($ios),
           $tpns->WithAccountList(array("account1", "account2", "account3")),
           $tpns->WithEnvironment(Tpns::ENVIRONMENT_PROD)
       );
       
       //@parameter: accessId=123456, secretKey="abcdef", host="api.tpns.tencent.com"
       $stub = new $tpns->Stub(123456, "abcdef", Tpns::GUANGZHOU);
       $result = $stub->Push($req);
       var_dump($result);
   
   ```    
   
7. 标签推送
   ```
   <?php
       use Agileadept\Tpns\AndroidMessage;
       use Agileadept\Tpns\iOSMessage;
       use Agileadept\Tpns\Message;
       use Agileadept\Tpns\Request;
       use Agileadept\Tpns\Stub;
       use Agileadept\Tpns\Tpns;
       use Agileadept\Tpns\TagItem;
       use Agileadept\Tpns\TagRule;

       //$android = new AndroidMessage;
       //$android->n_ch_id = "chid";
                       
       $ios = new iOSMessage;
       $ios->custom = "{\"key\":\"value\"}";

       $tagItem = new TagItem;
       $tagItem->tags = array("tag1", "tag2");
       $tagItem->tags_operator = Tpns::TAG_OPERATOR_AND;
       $tagItem->items_operator = Tpns::TAG_OPERATOR_OR;
       $tagItem->tag_type = "xg_auto_active";

       $tagRule = new TagRule;
       $tagRule->operator = Tpns::TAG_OPERATOR_OR;
       $tagRule->tag_items = array($tagItem);

       $tpns = new Tpns();                            
       $req = $tpns->NewRequest(
           $tpns->WithAudienceType(Tpns::AUDIENCE_TAG),
           $tpns->WithMessageType(Tpns::MESSAGE_NOTIFY),
           $tpns->WithTitle("this-title"),
           $tpns->WithContent("this-content"),
           //$tpns->WithAndroidMessage($android),
           $tpns->WithIOSMessage($ios),
           $tpns->WithTagRules(array($tagRule)),
           $tpns->WithEnvironment(Tpns::ENVIRONMENT_PROD)
       );
       
       //@parameter: accessId=123456, secretKey="abcdef", host="api.tpns.tencent.com"
       $stub = new Stub(123456, "abcdef", Tpns::GUANGZHOU);
       $result = $stub->Push($req);
       var_dump($result);
   
   ```  
8. 号码包推送
   ```
   <?php
       use Agileadept\Tpns\AndroidMessage;
       use Agileadept\Tpns\iOSMessage;
       use Agileadept\Tpns\Message;
       use Agileadept\Tpns\Request;
       use Agileadept\Tpns\Stub;
       use Agileadept\Tpns\Tpns;

       //$android = new AndroidMessage;
       //$android->n_ch_id = "chid";
                       
       $ios = new iOSMessage;
       $ios->custom = "{\"key\":\"value\"}";

       //@parameter: accessId=123456, secretKey="abcdef", host="api.tpns.tencent.com"
       $stub = new Stub(123456, "abcdef", Tpns::GUANGZHOU);

       //upload package file
       $uploadId = $stub->UploadFile("file.zip");

       $tpns = new Tpns();
       $req = $tpns->NewRequest(
           $tpns->WithAudienceType(Tpns::AUDIENCE_ACCOUNT_PACKAGE),
           $tpns->WithMessageType(Tpns::MESSAGE_NOTIFY),
           $tpns->WithTitle("this-title"),
           $tpns->WithContent("this-content"),
           //$tpns->WithAndroidMessage($android),
           $tpns->WithIOSMessage($ios),
           $tpns->WithEnvironment(Tpns::ENVIRONMENT_PROD),
           $tpns->WithUploadId($uploadId)
       );
       
       $result = $stub->Push($req);
       var_dump($result);
   
   ```  
9. token 文件包推送
   ```
   <?php
      use Agileadept\Tpns\AndroidMessage;
      use Agileadept\Tpns\iOSMessage;
      use Agileadept\Tpns\Message;
      use Agileadept\Tpns\Request;
      use Agileadept\Tpns\Stub;
      use Agileadept\Tpns\Tpns;

       //$android = new AndroidMessage;
       //$android->n_ch_id = "chid";
                       
       $ios = new iOSMessage;
       $ios->custom = "{\"key\":\"value\"}";

       //@parameter: accessId=123456, secretKey="abcdef", host="api.tpns.tencent.com"
       $stub = new Stub(123456, "abcdef", Tpns::GUANGZHOU);

       //upload package file
       $uploadId = $stub->UploadFile("file.zip");

       $tpns = new Tpns();
       $req = $tpns->NewRequest(
           $tpns->WithAudienceType(Tpns::AUDIENCE_TOKEN_PACKAGE),
           $tpns->WithMessageType(Tpns::MESSAGE_NOTIFY),
           $tpns->WithTitle("this-title"),
           $tpns->WithContent("this-content"),
           //$tpns->WithAndroidMessage($android),
           $tpns->WithIOSMessage($ios),
           $tpns->WithEnvironment(Tpns::ENVIRONMENT_PROD),
           $tpns->WithUploadId($uploadId)
       );
       
       $result = $stub->Push($req);
       var_dump($result);
   
   ```  
10. 其它
    可以具体参看官网文档，通过WithXXX方式来填充Request结构体，然后调用Stub->Push发起请求。     
