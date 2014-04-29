<?php
    include("menu.php");
    ?>





<?php
    echo "<div class='column'>";

    
    
    echo <<<EOT
    <ul>
    <p>代码相关问题</p>
    <li>问题一：淘宝API传来的数据都是SimpleXML对象格式，所以该应用完全是用SimpleXML来存储数据。对于数据库的使用暂未考虑，对用XML格式所带来的问题也暂未考虑。</li>
    <br/>
    <li>问题二：由于对PHP不熟练，显示数据的更新基本上都是整个页面的刷新来实现，暂时都是用get方法，对于表单重复提交的问题未进行处理。对部分内容的刷新开始转用AJAX重写。</li>
    <br/>
    <hr/>
    <p>功能相关问题</p>
    <li>问题三：在同步管理方面，现在还未对数据进行同步。需要确认正确性，现在的思路是这样的。在同步管理页面中显示的关联商品都是出于同步锁定的状态。每当任何一个关联商品出现了“ItemUpate,ItemAdd,ItemDelete,TradeSuccess”等事件时，需要我们去请求这些事件消息。淘宝以前有主动推送功能，现在木有了，换成了消息通道的方式。官方提供JSDK帮助AVA和C井以帮助其做HTTP长连接处理，但对PHP呢，不适合长连接的语言而已，只给了两条API，taobao.tmc.messages.consume和taobao.tmc.messages.confirm。前者用来请求最近未消费过的消息，后者来确认这些消息已被我们处理了。现在能想到的就是在nidama.com页面上做一个sleep5秒的死循环加入上面两条API获取和处理消息，但...不太好吧？有什么办法可以有效轮询...</li>
    <br/>
    <li>问题四：在商店管理方面，目前取得了上架了的橱窗商品和下架后的仓库商品信息，可以对其进行增删改，但是商品属性的修改在淘宝上就能够进行了，在这里我们只提供必要的属性修改，比如数量属性。至于其他商品属性的修改功能需要看情况添加。目前仅停留在商品阶段，且仅支持一口价商品，还未对产品这一概念相关内容进行处理，比如SKU中品牌属性、优惠详情等的同步修改。由于商品属性和产品属性太多，不知道需不需要做一一同步，还是说仅做数量同步。</li>
    <br/>
    <li>问题五：关于“订单的处理，新的订单同步。送仓库，清单，快递。”对于订单的处理，实际上涉及到的是商品的数量？由于淘宝商品设定了【拍下减库存】，所以订单还需要做什么处理吗？送仓库、清单、快递实际上要做什么不是很清楚。</li>
    <br/>
   
    </ul>
EOT;
    
    
    echo "</div>";
    
    ?>
























<?php
    include("foot.php");
    ?>