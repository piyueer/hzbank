@extends('header')

@section('content')

            <div class="wraper container-fluid">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="text-info">杭州移动API调用说明</h2>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
<ul>
<li><h3 class="text-success">api_before_demo.php</h3></li>
</ul><br/>


<h5 id="L.....................">概述和接口说明</h5>

<blockquote><p>贷款前信息查询，接口可以通过https访问，接口的值将以JSON字符串格式返回</p></blockquote>

<h5 id="URL">URL</h5>

<blockquote><p><a href="114.55.53.209/bank3/api_before_demo.php">http://114.55.53.209/bank3/api_before_demo.php</a><br/>
请注意，该URL是目前部署在公网的测试URL，系统上线之后，URL将会变化。目前的返回值都是测试数据，并不是真实数据，在未来两周左右时间，所有接口都会变成真实的数据，也会添加新的字段，并使用https。我们将提供在线的最新版本的使用说明书。但是返回的结构不会有大的变化。</p></blockquote>

<h5 id="HTTP............">HTTP请求方式</h5>

<blockquote><p>POST 或者 GET</p></blockquote>

<h5 id="L............">请求参数</h5>

<blockquote><table class="table table-striped table-bordered">
<thead>
<tr>
<th style="text-align:left;">参数</th>
<th style="text-align:left;">必选</th>
<th style="text-align:left;">类型</th>
<th style="text-align:left;">说明</th>
</tr>
</thead>
<tbody>
<tr>
<td style="text-align:left;">customerName </td>
<td style="text-align:left;">ture    </td>
<td style="text-align:left;">string</td>
<td style="text-align:left;">用户的姓名，例如 张三，李四 </td>
</tr>
<tr>
<td style="text-align:left;">cardID    </td>
<td style="text-align:left;">true    </td>
<td style="text-align:left;">string   </td>
<td style="text-align:left;">用户身份证号码，例如33010619781124401X （X可以接受大写或者小写）</td>
</tr>
<tr>
<td style="text-align:left;">phoneNumber </td>
<td style="text-align:left;">ture    </td>
<td style="text-align:left;">int</td>
<td style="text-align:left;">用户的手机号码，例如 13858001234</td>
</tr>
<tr>
<td style="text-align:left;">authcode    </td>
<td style="text-align:left;">true    </td>
<td style="text-align:left;">string   </td>
<td style="text-align:left;">用户的授权码，授权码是指用户与银行所签订的授权协议的文本id号，可以为任意值</td>
</tr>
</tbody>
</table>
</blockquote>

<h5 id="L...............">返回值说明</h5>

<blockquote><table class="table table-striped table-bordered">
<thead>
<tr>
<th style="text-align:left;">字段名</th>
<th style="text-align:left;">对应的含义</th>
</tr>
</thead>
<tbody>
<tr>
<td style="text-align:left;">IDMatched</td>
<td style="text-align:left;">表示用户的手机号码和身份证号码在移动数据库中是否一致，如果匹配，则返回TRUE，不匹配返回FALSE,如果不匹配，不再提供任何其他信息</td>
</tr>
<tr>
<td style="text-align:left;">OnlineTime</td>
<td style="text-align:left;">表示在网时间长度的档次(0表示1年以内，1表示1-2年，2表示2-3年，3表示3-4年，4表示4-5年，5表示5-6年，以此类推，10表示10年及10年以上)</td>
</tr>
<tr>
<td style="text-align:left;">busyLoc</td>
<td style="text-align:left;">表示用户忙时最主要的三个位置(精确到区县，忙时是指工作日上午10点至下午4点，中文长度不超过7位)</td>
</tr>
<tr>
<td style="text-align:left;">freeLoc</td>
<td style="text-align:left;">表示用户在闲时最主要的三个位置(精确到区县，闲时是指凌晨1点至3点，中文长度不超过7位)</td>
</tr>
<tr>
<td style="text-align:left;">voiceBillLevel</td>
<td style="text-align:left;">表示用户在过去三个月内语音消费档次(0表示0-150元，1表示150-300元，2表示300-500元，3表示500-900元，4表示900以上)</td>
</tr>
<tr>
<td style="text-align:left;">dataBillLevel</td>
<td style="text-align:left;">表示用户在过去三个月内数据消费档次(0表示0-60元，1表示60-120元，2表示120-180元，3表示180-240元，4表示240元以上)</td>
</tr>
<tr>
<td style="text-align:left;">spBillLevel</td>
<td style="text-align:left;">表示用户在过去三个月内sp业务消费档次(0表示0-60元，1表示60-120元，2表示120-180元，3表示180-240元，4表示240元以上)</td>
</tr>
<tr>
<td style="text-align:left;">industry</td>
<td style="text-align:left;">表示用户手机号码所属集团网的行业类型，不输出具体行业名称，党政军统一标识为政府部门，不再细分，行业类型中文长度不超过6位</td>
</tr>
<tr>
<td style="text-align:left;">casinoAreaLevel</td>
<td style="text-align:left;">表示用户在赌博区域漫游频率档次(0表示没有漫游，1表示漫游了1-2次，2表示漫游了3-4次，3表示4次以上)</td>
</tr>
<tr>
<td style="text-align:left;">badWordsSearchLevel</td>
<td style="text-align:left;">表示用户在过去三个月内对敏感关键字的搜索记录(0表示没有搜索，1表示1-3次，2表示4-7次，3表示8-10次，4表示10次以上)</td>
</tr>
<tr>
<td style="text-align:left;">billOverDueLevel</td>
<td style="text-align:left;">表示用户在过去一年内欠费的次数档次(0表示没有欠费，1表示欠费一次，2表示欠费2次，3表示欠费2次以上)</td>
</tr>
<tr>
<td style="text-align:left;">mostFrequentNumber</td>
<td style="text-align:left;">用户过去6个月内联系最频繁的三个号码及其对应时间档次，时间长度用整形有限可枚举值标识，枚举值为1-10，1：0-4小时；2：4-8小时；3：8-16小时；4：16-32小时；5：32-48小时；6：48-64小时；7：64-80小时；8：80-96小时；9：96-128小时；10：128小时以上</td>
</tr>
<tr>
<td style="text-align:left;">powerOffTime</td>
<td style="text-align:left;">用户在过去一周内关机时间档次(0表示关机10小时以下，1表示关机10-15小时，2表示关机16-20小时，3表示关机20-40小时，4表示关机40-50小时，5表示关机50小时以上)</td>
</tr>
</tbody>
</table>
</blockquote>

<p><br/><br/></p>

<blockquote><p><strong><em> ——正确的访问情况下，如<a href="http://114.55.53.209/bank3/api_before_demo.php?authcode=test001&amp;phoneNumber=13858007250&amp;customerName=%E9%BB%8E%E5%A3%A4&amp;cardID=33010619781124401X">http://114.55.53.209/bank3/api_before_demo.php?authcode=test001&amp;phoneNumber=13858007250&amp;customerName=%E9%BB%8E%E5%A3%A4&amp;cardID=33010619781124401X</a> </em></strong></p>

<blockquote><p><strong><em> 返回JSON示例(用户的手机号码与身份证号码匹配成功的情况) </em></strong></p></blockquote></blockquote>

<pre><code>{
    "idMatched": {
        "value": "1",
        "message": "该用户的姓名,身份证号码,手机号码完全匹配"
    },
    "onlineTime": {
        "value": "5",
        "message": "该用户在网时长为10年之上"
    },
    "busyLoc": {
        "value": "杭州市西湖区,杭州市下城区,杭州市上城区",
        "message": "忙时活动区域：杭州市西湖区,杭州市下城区,杭州市上城区"
    },
    "freeLoc": {
        "value": "杭州市余杭区,杭州市滨江区,杭州市萧山区",
        "message": "闲时活动区域：杭州市余杭区,杭州市滨江区,杭州市萧山区"
    },
    "voiceBillLevel": {
        "value": "1",
        "message": "三个月语言消费150-300元"
    },
    "dataBillLevel": {
        "value": "2",
        "message": "三个月数据消费120-180元"
    },
    "spBillLevel": {
        "value": "3",
        "message": "三个月内sp业务消费的档次"
    },
    "industry": {
        "value": "商贸类",
        "message": "客户行业类型:商贸类"
    },
    "casinoAreaLevel": {
        "value": "1",
        "message": "在过去三个月内在澳门、新加坡、马来西亚漫游了1-2次"
    },
    "badWordsSearchLevel": {
        "value": "1",
        "message": "在过去三个月内搜索黑名单上的关键字1-3次"
    },
    "billOverDueLevel": {
        "value": "0",
        "message": "在过去三个月内欠费0次"
    },
    "mostFrequentNumber": {
        "value": {
            "value1": "13805711234",
            "length1": "3",
            "value2": "13805712345",
            "length2": "2",
            "value3": "13805714567",
            "length3": "1"
        },
        "message": "与13805711234联系时长为8-16小时,与13805712345联系时长为4-8小时,与13805714567联系时长为0-4小时"
    },
    "powerOffTime": {
        "value": "2",
        "message": "在过去一周内关机的时长为16-20小时"
    }
}
</code></pre>

<blockquote><blockquote><p><strong><em> 返回JSON示例(用户的手机号码与身份证号码不匹配的情况) </em></strong></p></blockquote></blockquote>

<pre><code>{
    "idMatched": {
        "value": "-6",
        "message": "该用户的姓名、身份证号码，手机号码不匹配"
    }
}
</code></pre>

<blockquote><p><strong><em> ——错误的访问情况下 </em></strong></p>

<blockquote><p><strong><em> 第一种错误：缺少输入参数 </em></strong></p>

<blockquote><p>身份证号码、用户姓名、用户手机号码、用户授权码全部都是必须传送的字段，缺少其中任何一个都会导致API返回错误提示。例如：
<a href="http://114.55.53.209/bank3/api_before_demo.php?authcode=test001&amp;phoneNumber=13858007250&amp;cardID=33010619781124401X">http://114.55.53.209/bank3/api_before_demo.php?authcode=test001&amp;phoneNumber=13858007250&amp;cardID=33010619781124401X</a>   （其中用户的姓名缺少了）
将会返回<br>
<code>{"error":{"value":"-4","message":"customer name is missing."}}</code></p>

<p><a href="http://114.55.53.209/bank3/api_before_demo.php?authcode=test001&amp;phoneNumber=13858007250&amp;customerName=%E9%BB%8E%E5%A3%A4">http://114.55.53.209/bank3/api_before_demo.php?authcode=test001&amp;phoneNumber=13858007250&amp;customerName=%E9%BB%8E%E5%A3%A4</a>  （其中用户的身份证号码缺少了）将会返回<br>
<code>{"error":{"value":"-5","message":"card id is missing."}}</code></p></blockquote>

<p><strong><em>第二种错误：身份验证失败 </em></strong></p>

<blockquote><p><a href="http://114.55.53.209/bank3/api_before_demo.php?authcode=test001&amp;phoneNumber=13858007251&amp;customerName=%E9%BB%8E%E5%A3%A4&amp;cardID=33010619781124401X">http://114.55.53.209/bank3/api_before_demo.php?authcode=test001&amp;phoneNumber=13858007251&amp;customerName=%E9%BB%8E%E5%A3%A4&amp;cardID=33010619781124401X</a>
将会返回<br>
<code>{"idMatched":{"value":"0","message":"该用户的姓名、身份证号码，手机号码不匹配"}}</code>
在身份验证失败后，其他所有的字段将不再输出。</p></blockquote></blockquote></blockquote>

<p><strong><em> 在目前的测试API中，只有
phoneNumber=13858007250
customerName=黎壤
cardID=33010619781124401X
才能通过身份验证。其他所有的组合都会提示<code>{"idMatched":{"value":"0","message":"该用户的姓名、身份证号码，手机号码不匹配"}}</code>。 </em></strong></p>

<hr/><br/>

<ul>
<li><h3 class="text-success">api_after_demo.php</h3></li>
</ul><br/>


<h5 id="L.....................">概述和接口说明</h5>

<blockquote><p>贷款后信息查询，接口可以通过https访问，接口的值将以JSON字符串格式返回</p></blockquote>

<h5 id="URL">URL</h5>

<blockquote><p><a href="114.55.53.209/bank3/api_after_demo.php">http://114.55.53.209/bank3/api_after_demo.php</a><br/>
请注意，该URL是目前部署在公网的测试URL，系统上线之后，URL将会变化。目前的返回值都是测试数据，并不是真实数据，在未来两周左右时间，所有接口都会变成真实的数据，也会添加新的字段，并使用https。我们将提供在线的最新版本的使用说明书。但是返回的结构不会有大的变化。</p></blockquote>

<h5 id="HTTP............">HTTP请求方式</h5>

<blockquote><p>POST 或者 GET</p></blockquote>

<h5 id="L............">请求参数</h5>

<blockquote><table class="table table-striped table-bordered">
<thead>
<tr>
<th style="text-align:left;">参数</th>
<th style="text-align:left;">必选</th>
<th style="text-align:left;">类型</th>
<th style="text-align:left;">说明</th>
</tr>
</thead>
<tbody>
<tr>
<td style="text-align:left;">customerName </td>
<td style="text-align:left;">ture    </td>
<td style="text-align:left;">string</td>
<td style="text-align:left;">用户的姓名，例如 张三，李四 </td>
</tr>
<tr>
<td style="text-align:left;">cardID    </td>
<td style="text-align:left;">true    </td>
<td style="text-align:left;">string   </td>
<td style="text-align:left;">用户身份证号码，例如33010619781124401X （X可以接受大写或者小写）</td>
</tr>
<tr>
<td style="text-align:left;">phoneNumber </td>
<td style="text-align:left;">ture    </td>
<td style="text-align:left;">int</td>
<td style="text-align:left;">用户的手机号码，例如 13858001234</td>
</tr>
<tr>
<td style="text-align:left;">authcode    </td>
<td style="text-align:left;">true    </td>
<td style="text-align:left;">string   </td>
<td style="text-align:left;">用户的授权码，授权码是指用户与银行所签订的授权协议的文本id号，可以为任意值</td>
</tr>
</tbody>
</table>
</blockquote>

<h5 id="L...............">返回值说明</h5>

<blockquote><table class="table table-striped table-bordered">
<thead>
<tr>
<th style="text-align:left;">字段名</th>
<th style="text-align:left;">对应的含义</th>
</tr>
</thead>
<tbody>
<tr>
<td style="text-align:left;">IDMatched</td>
<td style="text-align:left;">表示用户的手机号码和身份证号码在移动数据库中是否一致，如果匹配，则返回TRUE，不匹配返回FALSE,如果不匹配，不再提供任何其他信息</td>
</tr>
<tr>
<td style="text-align:left;">oldNumberUsed</td>
<td style="text-align:left;">表示用户在过去一个月内原注册手机号码通话频繁程度(0表示没有通话时长，1表示通话时长0-100分钟，2表示通话时长100-200分钟，3表示通话时长200分钟以上)</td>
</tr>
<tr>
<td style="text-align:left;">busyLoc</td>
<td style="text-align:left;">表示用户忙时最主要的三个位置(精确到区县，忙时是指工作日上午10点至下午4点，中文长度不超过7位)</td>
</tr>
<tr>
<td style="text-align:left;">freeLoc</td>
<td style="text-align:left;">表示用户在闲时最主要的三个位置(精确到区县，闲时是指凌晨1点至3点，中文长度不超过7位)</td>
</tr>
<tr>
<td style="text-align:left;">voiceBillLevel</td>
<td style="text-align:left;">表示用户在过去三个月内语音消费档次(0表示0-150元，1表示150-300元，2表示300-500元，3表示500-900元，4表示900以上)</td>
</tr>
<tr>
<td style="text-align:left;">dataBillLevel</td>
<td style="text-align:left;">表示用户在过去三个月内数据消费档次(0表示0-60元，1表示60-120元，2表示120-180元，3表示180-240元，4表示240元以上)</td>
</tr>
<tr>
<td style="text-align:left;">spBillLevel</td>
<td style="text-align:left;">表示用户在过去三个月内sp业务消费档次(0表示0-60元，1表示60-120元，2表示120-180元，3表示180-240元，4表示240元以上)</td>
</tr>
<tr>
<td style="text-align:left;">casinoAreaLevel</td>
<td style="text-align:left;">表示用户在赌博区域漫游频率档次(0表示没有漫游，1表示漫游了1-2次，2表示漫游了3-4次，3表示4次以上)</td>
</tr>
<tr>
<td style="text-align:left;">badWordsSearchLevel</td>
<td style="text-align:left;">表示用户在过去三个月内对敏感关键字的搜索记录(0表示没有搜索，1表示1-3次，2表示4-7次，3表示8-10次，4表示10次以上)</td>
</tr>
<tr>
<td style="text-align:left;">billOverDueLevel</td>
<td style="text-align:left;">表示用户在过去一年内欠费的次数档次(0表示没有欠费，1表示欠费一次，2表示欠费2次，3表示欠费2次以上)</td>
</tr>
<tr>
<td style="text-align:left;">frequentNumberChanged</td>
<td style="text-align:left;">用户手机号码在过去一个月内相比过去两个月内主要联系人的变化程度(返回前10个主要联系人变化的数量，例如返回5表示有5个主要联系人发生了变化，大于等于8表示机主通化圈发生明显变化)</td>
</tr>
<tr>
<td style="text-align:left;">powerOffTime</td>
<td style="text-align:left;">用户在过去一周内关机时间档次(0表示关机10小时以下，1表示关机10-15小时，2表示关机16-20小时，3表示关机20-40小时，4表示关机40-50小时，5表示关机50小时以上)</td>
</tr>
</tbody>
</table>
</blockquote>

<p><br/><br/></p>

<blockquote><p><strong><em> ——正确的访问情况下，如<a href="http://114.55.53.209/bank3/api_after_demo.php?authcode=test001&amp;phoneNumber=13858007250&amp;customerName=%E9%BB%8E%E5%A3%A4&amp;cardID=33010619781124401X">http://114.55.53.209/bank3/api_after_demo.php?authcode=test001&amp;phoneNumber=13858007250&amp;customerName=%E9%BB%8E%E5%A3%A4&amp;cardID=33010619781124401X</a> </em></strong></p>

<blockquote><p><strong><em> 返回JSON示例(用户的手机号码与身份证号码匹配成功的情况) </em></strong></p></blockquote></blockquote>

<pre><code>{
    "idMatched": {
        "value": "1",
        "message": "该用户的姓名,身份证号码,手机号码完全匹配"
    },
    "oldNumberUsed": {
        "value": "3",
        "message": "用户原注册手机号码通话时长200分钟以上"
    },
    "busyLoc": {
        "value": "杭州市西湖区,杭州市下城区,杭州市上城区",
        "message": "忙时活动区域：杭州市西湖区,杭州市下城区,杭州市上城区"
    },
    "freeLoc": {
        "value": "杭州市余杭区,杭州市滨江区,杭州市萧山区",
        "message": "闲时活动区域：杭州市余杭区,杭州市滨江区,杭州市萧山区"
    },
    "voiceBillLevel": {
        "value": "1",
        "message": "三个月语言消费150-300元"
    },
    "dataBillLevel": {
        "value": "2",
        "message": "三个月数据消费120-180元"
    },
    "spBillLevel": {
        "value": "3",
        "message": "三个月内sp业务消费的档次"
    },
    "casinoAreaLevel": {
        "value": "1",
        "message": "在过去三个月内在澳门、新加坡、马来西亚漫游了1-2次"
    },
    "badWordsSearchLevel": {
        "value": "1",
        "message": "在过去三个月内搜索黑名单上的关键字1-3次"
    },
    "billOverDueLevel": {
        "value": "0",
        "message": "在过去三个月内欠费0次"
    },
    "frequentNumberChanged": {
        "value": "3",
        "message": "机主通话圈没有明显变化"
    },
    "powerOffTime": {
        "value": "2",
        "message": "在过去一周内关机的时长为16-20小时"
    }
}
</code></pre>

<blockquote><blockquote><p><strong><em> 返回JSON示例(用户的手机号码与身份证号码不匹配的情况) </em></strong></p></blockquote></blockquote>

<pre><code>{
    "idMatched": {
        "value": "-6",
        "message": "该用户的姓名、身份证号码，手机号码不匹配"
    }
}
</code></pre>

<blockquote><p><strong><em> ——错误的访问情况下 </em></strong></p>

<blockquote><p><strong><em> 第一种错误：缺少输入参数 </em></strong></p>

<blockquote><p>身份证号码、用户姓名、用户手机号码、用户授权码全部都是必须传送的字段，缺少其中任何一个都会导致API返回错误提示。例如：
<a href="http://114.55.53.209/bank3/api_after_demo.php?authcode=test001&amp;phoneNumber=13858007250&amp;cardID=33010619781124401X">http://114.55.53.209/bank3/api_after_demo.php?authcode=test001&amp;phoneNumber=13858007250&amp;cardID=33010619781124401X</a>   （其中用户的姓名缺少了）
将会返回<br>
<code>{"error":{"value":"-4","message":"customer name is missing."}}</code></p>

<p><a href="http://114.55.53.209/bank3/api_after_demo.php?authcode=test001&amp;phoneNumber=13858007250&amp;customerName=%E9%BB%8E%E5%A3%A4">http://114.55.53.209/bank3/api_after_demo.php?authcode=test001&amp;phoneNumber=13858007250&amp;customerName=%E9%BB%8E%E5%A3%A4</a>  （其中用户的身份证号码缺少了）将会返回<br>
<code>{"error":{"value":"-5","message":"card id is missing."}}</code></p></blockquote>

<p><strong><em>第二种错误：身份验证失败 </em></strong></p>

<blockquote><p><a href="http://114.55.53.209/bank3/api_after_demo.php?authcode=test001&amp;phoneNumber=13858007251&amp;customerName=%E9%BB%8E%E5%A3%A4&amp;cardID=33010619781124401X">http://114.55.53.209/bank3/api_after_demo.php?authcode=test001&amp;phoneNumber=13858007251&amp;customerName=%E9%BB%8E%E5%A3%A4&amp;cardID=33010619781124401X</a>
将会返回<br>
<code>{"idMatched":{"value":"0","message":"该用户的姓名、身份证号码，手机号码不匹配"}}</code>
在身份验证失败后，其他所有的字段将不再输出。</p></blockquote></blockquote></blockquote>

<p><strong><em> 在目前的测试API中，只有
phoneNumber=13858007250
customerName=黎壤
cardID=33010619781124401X
才能通过身份验证。其他所有的组合都会提示<code>{"idMatched":{"value":"0","message":"该用户的姓名、身份证号码，手机号码不匹配"}}</code>。 </em></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End row -->
                
@endsection