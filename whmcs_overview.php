<?php
echo "<style type='text/css'>.row{margin-left:-5px;margin-right:-5px}.col-lg-1,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-lg-10,.col-lg-11,.col-lg-12{float:left}.col-lg-12{width:100%}.col-lg-11{width:91.66666667%}.col-lg-10{width:83.33333333%}.col-lg-9{width:75%}.col-lg-8{width:66.66666667%}.col-lg-7{width:58.33333333%}.col-lg-6{width:50%}.col-lg-5{width:41.66666667%}.col-lg-4{width:33.33333333%}.col-lg-3{width:25%}.col-lg-2{width:16.66666667%}.col-lg-1{width:8.33333333%}.col-lg-pull-12{right:100%}.col-lg-pull-11{right:91.66666667%}.col-lg-pull-10{right:83.33333333%}.col-lg-pull-9{right:75%}.col-lg-pull-8{right:66.66666667%}.col-lg-pull-7{right:58.33333333%}.col-lg-pull-6{right:50%}.col-lg-pull-5{right:41.66666667%}.col-lg-pull-4{right:33.33333333%}.col-lg-pull-3{right:25%}.col-lg-pull-2{right:16.66666667%}.col-lg-pull-1{right:8.33333333%}.col-lg-pull-0{right:0}.col-lg-push-12{left:100%}.col-lg-push-11{left:91.66666667%}.col-lg-push-10{left:83.33333333%}.col-lg-push-9{left:75%}.col-lg-push-8{left:66.66666667%}.col-lg-push-7{left:58.33333333%}.col-lg-push-6{left:50%}.col-lg-push-5{left:41.66666667%}.col-lg-push-4{left:33.33333333%}.col-lg-push-3{left:25%}.col-lg-push-2{left:16.66666667%}.col-lg-push-1{left:8.33333333%}.col-lg-push-0{left:0}.col-lg-offset-12{margin-left:100%}.col-lg-offset-11{margin-left:91.66666667%}.col-lg-offset-10{margin-left:83.33333333%}.col-lg-offset-9{margin-left:75%}.col-lg-offset-8{margin-left:66.66666667%}.col-lg-offset-7{margin-left:58.33333333%}.col-lg-offset-6{margin-left:50%}.col-lg-offset-5{margin-left:41.66666667%}.col-lg-offset-4{margin-left:33.33333333%}.col-lg-offset-3{margin-left:25%}.col-lg-offset-2{margin-left:16.66666667%}.col-lg-offset-1{margin-left:8.33333333%}.col-lg-offset-0{margin-left:0}.jqstooltip{-webkit-box-sizing: content-box;-moz-box-sizing: content-box;box-sizing: content-box;}.smallstat{background: white;position: relative;text-align: right;margin-bottom: 30px;height: 70px;border: 1px solid #e1e6ef;}.smallstat .linechart-overlay,.smallstat .boxchart-overlay{width: 100px;height: 68px;padding: 20px 0;text-align: center;margin-right: 10px;float: left;overflow: hidden;}.smallstat .linechart-overlay.blue,.smallstat .boxchart-overlay.blue{background: #36a9e1;}.smallstat .linechart-overlay.lightBlue,.smallstat .boxchart-overlay.lightBlue{background: #67c2ef;}.smallstat .linechart-overlay.green,.smallstat .boxchart-overlay.green{background: #bdea74;}.smallstat .linechart-overlay.darkGreen,.smallstat .boxchart-overlay.darkGreen{background: #78cd51;}.smallstat .linechart-overlay.pink,.smallstat .boxchart-overlay.pink{background: #e84c8a;}.smallstat .linechart-overlay.orange,.smallstat .boxchart-overlay.orange{background: #fa603d;}.smallstat .linechart-overlay.lightOrange,.smallstat .boxchart-overlay.lightOrange{background: #fabb3d;}.smallstat .linechart-overlay.red,.smallstat .boxchart-overlay.red{background: #ff5454;}.smallstat .linechart-overlay.yellow,.smallstat .boxchart-overlay.yellow{background: #eae874;}.smallstat .linechart-overlay.white,.smallstat .boxchart-overlay.white{background: white;}.smallstat i{text-align: center;display: block;color: white;width: 100px;height: 68px;font-size: 22px;line-height: 68px;float: left;margin-right: 10px;}.smallstat i.blue{background: #36a9e1;}.smallstat i.lightBlue{background: #67c2ef;}.smallstat i.green{background: #bdea74;}.smallstat i.darkGreen{background: #78cd51;}.smallstat i.pink{background: #e84c8a;}.smallstat i.orange{background: #fa603d;}.smallstat i.lightOrange{background: #fabb3d;}.smallstat i.red{background: #ff5454;}.smallstat i.yellow{background: #eae874;}.smallstat i.white{background: white;}.smallstat .title,.smallstat .value{display: block;padding-top: 10px;width: 100%;text-align: center;}.smallstat .value{padding-top: 16px;font-size: 16px;}.smallstat .title{color: #3B3B3D;font-size: 12px;text-transform: uppercase;font-weight: bold;}\n.stat1{padding:2px 7px;background-color: #0090D8;color:#FFFFFF;font-weight:bold;-moz-border-radius:3px;-webkit-border-radius:3px;border-radius: 3px;}\n</style>";

if (!defined("WHMCS"))
	die("This file cannot be accessed directly");

function widget_whmcs_overview($vars) {
    global $whmcs,$_ADMINLANG,$currency,$currencytotal,$data;

function ah_formatstat2($billingcycle,$stat) {
    global $data,$currency,$currencytotal;
    $value = array_key_exists($billingcycle,$data) ? $data[$billingcycle][$stat] : '';
    if (!$value) $value = 0;
    if ($stat=="sum") {
        if ($billingcycle=="Monthly") {
            $currencytotal += $value*12;
        } elseif ($billingcycle=="Quarterly") {
            $currencytotal += $value*4;
        } elseif ($billingcycle=="Semi-Annually") {
            $currencytotal += $value*2;
        } elseif ($billingcycle=="Annually") {
            $currencytotal += $value;
        } elseif ($billingcycle=="Biennially") {
            $currencytotal += $value/2;
        } elseif ($billingcycle=="Triennially") {
            $currencytotal += $value/3;
        }
        $value = formatCurrency($value);
    }
    return $value;
}
$incomestats = array();
$result = select_query("tblhosting,tblclients", "currency,billingcycle,COUNT(*),SUM(amount)", "tblclients.id = tblhosting.userid AND (domainstatus = 'Active' OR domainstatus = 'Suspended') GROUP BY currency, billingcycle");
while ($data = mysql_fetch_array($result)) {
    $incomestats[$data['currency']][$data['billingcycle']]["count"] = $data[2];
    $incomestats[$data['currency']][$data['billingcycle']]["sum"] = $data[3];
}
$result = select_query("tblhostingaddons,tblhosting,tblclients", "currency,tblhostingaddons.billingcycle,COUNT(*),SUM(recurring)", "tblhostingaddons.hostingid=tblhosting.id AND tblclients.id=tblhosting.userid AND (tblhostingaddons.status='Active' OR tblhostingaddons.status='Suspended') GROUP BY currency, tblhostingaddons.billingcycle");
while ($data = mysql_fetch_array($result)) {
    if (isset($incomestats[$data['currency']][$data['billingcycle']]["count"])) $incomestats[$data['currency']][$data['billingcycle']]["count"] += $data[2];
    else $incomestats[$data['currency']][$data['billingcycle']]["count"] = $data[2];
    if (isset($incomestats[$data['currency']][$data['billingcycle']]["sum"])) $incomestats[$data['currency']][$data['billingcycle']]["sum"] += $data[3];
    else $incomestats[$data['currency']][$data['billingcycle']]["sum"] = $data[3];
}
$result = select_query("tbldomains,tblclients", "currency,COUNT(*),SUM(recurringamount/registrationperiod)", "tblclients.id=tbldomains.userid AND tbldomains.status='Active' GROUP BY currency");
while ($data = mysql_fetch_array($result)) {
    if (isset($incomestats[$data['currency']]["Annually"]["count"])) $incomestats[$data['currency']]["Annually"]["count"] += $data[1];
    else $incomestats[$data['currency']]["Annually"]["count"] = $data[1];
    if (isset($incomestats[$data['currency']]["Annually"]["sum"])) $incomestats[$data['currency']]["Annually"]["sum"] += $data[2];
    else $incomestats[$data['currency']]["Annually"]["sum"] = $data[2];
}
        $activeclients = get_query_val("tblclients","COUNT(id)","status='Active'");
        $totalclients = get_query_val("tblclients","COUNT(id)","");
        $clientsactive = ($activeclients==0 || $totalclients==0) ? '0' : round((($activeclients/$totalclients)*100),0);
		if (count($invoicetotals)) {
			echo "<div class=\"contentbox\" style=\"font-size:18px;\">";
			foreach ($invoicetotals as $vals) {
				echo "<b>" . $vals['currencycode'] . "</b> " . $aInt->lang("status", "paid") . ": <span class=\"textgreen\"><b>" . $vals['paid'] . "</b></span> " . $aInt->lang("status", "unpaid") . ": <span class=\"textred\"><b>" . $vals['unpaid'] . "</b></span> " . $aInt->lang("status", "overdue") . ": <span class=\"textblack\"><b>" . $vals['overdue'] . "</b></span><br />";
			}

			echo "</div><br />";
		}
		$content = '';
if (count($incomestats)) {
    foreach ($incomestats AS $currency=>$data) {
        $currency = getCurrency("",$currency);
        $currencytotal = 0;
        $content .= "<div style=\"float:left;margin:10px 0 10px 0;".((count($incomestats)>1)?'width:50%;':'width:100%;')."text-align:center;\"><p><span class=\"textred\"><strong>{$currency['code']} ".$_ADMINLANG['currencies']['currency']."</strong></span><br />
    ".$_ADMINLANG['billingcycles']['monthly'].": ".ah_formatstat2('Monthly','sum')." (".ah_formatstat2('Monthly','count').")<br />
    ".$_ADMINLANG['billingcycles']['quarterly'].": ".ah_formatstat2('Quarterly','sum')." (".ah_formatstat2('Quarterly','count').")<br />
    ".$_ADMINLANG['billingcycles']['semiannually'].": ".ah_formatstat2('Semi-Annually','sum')." (".ah_formatstat2('Semi-Annually','count').")<br />
    ".$_ADMINLANG['billingcycles']['annually'].": ".ah_formatstat2('Annually','sum')." (".ah_formatstat2('Annually','count').")<br />
    ".$_ADMINLANG['billingcycles']['biennially'].": ".ah_formatstat2('Biennially','sum')." (".ah_formatstat2('Biennially','count').")<br />
    ".$_ADMINLANG['billingcycles']['triennially'].": ".ah_formatstat2('Triennially','sum')." (".ah_formatstat2('Triennially','count').")<br />
    <span class=\"textgreen\"><strong>".$_ADMINLANG['billing']['annualestimate'].": ".formatCurrency($currencytotal)."</strong></span></p></div>";
	$monthlyincome =  '<span class="stat1" style="padding-right:2px;">'.ah_formatstat2('Monthly','sum').' </span><span class="label">'.ah_formatstat2("Monthly","count").'</span>';
	$result = full_query("SELECT COUNT(*),SUM(total)-COALESCE(SUM((SELECT SUM(amountin) FROM tblaccounts WHERE tblaccounts.invoiceid=tblinvoices.id)),0) FROM tblinvoices WHERE tblinvoices.status='Unpaid'");
	$data = mysql_fetch_array($result);
	$dueinvoices = $data[0];
	$overdueinvoicesbal = $data[1];
	$activeservices = get_query_val("tblhosting","COUNT(id)","domainstatus='Active'");
    $totalservices = get_query_val("tblhosting","COUNT(id)","");
    $servicesactive = ($activeservices==0 || $totalservices==0) ? '0' : round((($activeservices/$totalservices)*100),0);
    }
} else {
    $content = '<p align="center">No Active or Suspended Products/Services Found to build Forecast</p>';
}
	    $content = '<div class="row">
				<div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
					<div class="smallstat">
						
						<span class="title">Active Clients</span>
						<span class="value"><span class="stat1">'.$totalclients.'</span> / <span class="stat1">'.$clientsactive.'</span></span>	
							
					</div>
				</div>

				<div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
					<div class="smallstat">
						<span class="title">Active Services</span>
						<span class="value"><span class="stat1">'.$activeservices.'</span> / <span class="stat1">'.$totalservices.'</span></span>							
					</div>
				</div>

				<div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
					<div class="smallstat">
						<span class="title">Monthly Income</span>
						<span class="value">'.$monthlyincome.'</span>
					</div>
				</div>

				<div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
					<div class="smallstat">
						<span class="title">Due Invoices</span>							
						<span class="value"><span class="stat1">'.$dueinvoices.'</span><span class="label">'.formatCurrency($overdueinvoicesbal).'</span></span>  	
					</div>
				</div>
			</div>';

    return array('title'=>'Whmcs Overview','content'=>$content);

}

add_hook("AdminHomeWidgets",1,"widget_whmcs_overview");

?>
