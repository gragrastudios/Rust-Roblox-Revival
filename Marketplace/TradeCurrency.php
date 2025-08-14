<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/navbar.php");
if($loggedin == 'no'){header('Location: /Login/Default.aspx'); exit();}
?>

    <div id="TradeCurrencyContainer">
        <h2>Currency Exchange</h2>
        <div style="margin-bottom:5px; text-align:center;"><a href="/Marketplace/TradeCurrency.aspx">Refresh</a></div>
        <div class="LeftColumn">
            <div id="CurrencyBidsPane">
                

<div class="CurrencyBids">
    <h4>Available Tickets</h4>
    
            <div class="CurrencyBid">
                27,175 @ 3.8220:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                22 @ 3.6666:1
            </div>
        
            <div class="CurrencyBid">
                43 @ 3.5833:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                20,468 @ 3.4591:1
            </div>
        
            <div class="CurrencyBid">
                11,736 @ 3.4588:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                201 @ 3.4067:1
            </div>
        
            <div class="CurrencyBid">
                10 @ 3.3333:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                162 @ 3.24:1
            </div>
        
            <div class="CurrencyBid">
                113 @ 3.2285:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                31,500 @ 3.15:1
            </div>
        
            <div class="CurrencyBid">
                1,075 @ 3.1069:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                37 @ 3.0833:1
            </div>
        
            <div class="CurrencyBid">
                7,812 @ 3.0671:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                92 @ 3.0666:1
            </div>
        
            <div class="CurrencyBid">
                76 @ 3.04:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                380 @ 3.0158:1
            </div>
        
            <div class="CurrencyBid">
                1,187 @ 3.0050:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                841 @ 3.0035:1
            </div>
        
            <div class="CurrencyBid">
                3,001 @ 3.001:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                60 @ 3:1
            </div>
        
    
</div>
            </div>
        </div>
        <div class="CenterColumn">
            <div id="CurrencyQuotePane">
                

<div class="CurrencyQuote">
    <div class="TableHeader">
        <div class="Pair">Pair</div>
        <div class="Rate">Rate</div>
        <div class="Spread">Spread</div>
        <div class="HighLow">High/Low</div>
        <div style="clear: both;"></div>
    </div>
    <div class="TableRow">
        <div class="Pair">BUX/TIX</div>
        <div class="Rate">3.8220/3.9023</div>
        <div class="Spread">80</div>
        <div class="HighLow">459/0.0018</div>
        <div style="clear: both;"></div>
    </div>
</div>
            </div>
            <div id="ctl00_cphRoblox_CurrencyTradePane">
                <div class="CurrencyTrade">
                    <h4>Trade</h4>
                    <div class="CurrencyTradeDetails">
                        <div class="CurrencyTradeDetail">
                            <span title="A market order is a buy or sell order to be executed immediately at current market prices. As long as there are willing sellers and buyers, a market order will be filled."><input id="ctl00_cphRoblox_MarketOrderRadioButton" name="ctl00$cphRoblox$OrderType" value="MarketOrderRadioButton" checked="checked" onclick="if (document.getElementById('ctl00_cphRoblox_MarketOrderRadioButton').checked) { document.getElementById('LimitOrder').style.display='none'; document.getElementById('SplitTrades').style.display='none'; document.getElementById('MarketOrder').style.display=''; } else { document.getElementById('LimitOrder').style.display=''; document.getElementById('SplitTrades').style.display=''; document.getElementById('MarketOrder').style.display='none'; };" type="radio"><label for="ctl00_cphRoblox_MarketOrderRadioButton">Market Order</label></span>&nbsp;
                            <span title="A limit order is an order to buy at no more (or sell at no less) than a specific price. This gives you some control over the price at which the trade is executed, but may prevent the order from being executed."><input id="ctl00_cphRoblox_LimitOrderRadioButton" name="ctl00$cphRoblox$OrderType" value="LimitOrderRadioButton" onclick="if (document.getElementById('ctl00_cphRoblox_LimitOrderRadioButton').checked) { document.getElementById('LimitOrder').style.display=''; document.getElementById('SplitTrades').style.display=''; document.getElementById('MarketOrder').style.display='none'; } else { document.getElementById('LimitOrder').style.display='none'; document.getElementById('SplitTrades').style.display='none'; document.getElementById('MarketOrder').style.display=''; };" type="radio"><label for="ctl00_cphRoblox_LimitOrderRadioButton">Limit Order</label></span>
                        </div>
                        <div class="CurrencyTradeDetail">
                            <div>What I'll give:</div>
                            <input name="ctl00$cphRoblox$HaveAmountTextBox" maxlength="9" id="ctl00_cphRoblox_HaveAmountTextBox" tabindex="1" class="TradeBox" autocomplete="off" onkeyup="EstimateTrade()" onblur="if (document.getElementById('ctl00_cphRoblox_MarketOrderRadioButton').checked) { if (document.getElementById('ctl00_cphRoblox_HaveCurrencyDropDownList').selectedIndex == 0) { var haveBox = document.getElementById('ctl00_cphRoblox_HaveAmountTextBox'); if (parseInt(haveBox.value) < 20) { alert('Market Orders must be at least 20 Tickets.'); haveBox.value = ''; haveBox.focus(); } } }" type="text">
                            
                            
                            &nbsp;&nbsp;
                            <select name="ctl00$cphRoblox$HaveCurrencyDropDownList" id="ctl00_cphRoblox_HaveCurrencyDropDownList" onchange="ctl00_cphRoblox_WantCurrencyDropDownList.selectedIndex = ctl00_cphRoblox_HaveCurrencyDropDownList.selectedIndex; EstimateTrade()">
	<option value="Tickets" selected="selected">Tickets</option>
	<option value="Robux">Robux</option>

</select>
                        </div>
                        <div id="LimitOrder" class="CurrencyTradeDetail" style="display: none;">
                            <div>What I want:</div>
                            <input name="ctl00$cphRoblox$WantAmountTextBox" maxlength="9" id="ctl00_cphRoblox_WantAmountTextBox" tabindex="2" class="TradeBox" autocomplete="off" type="text">
                            
                            
                            &nbsp;
                            <select name="ctl00$cphRoblox$WantCurrencyDropDownList" id="ctl00_cphRoblox_WantCurrencyDropDownList" onchange="ctl00_cphRoblox_HaveCurrencyDropDownList.selectedIndex = ctl00_cphRoblox_WantCurrencyDropDownList.selectedIndex; EstimateTrade()">
	<option value="Robux" selected="selected">Rustbux</option>
	<option value="Tickets">Tickets</option>

</select>
                            <p style="color: Red;">* NOTE: Your money will be held for safe-keeping until either the trade executes or you cancel your position.</p>
                            <p style="font-size: smaller; margin: 15px; text-align: left;">A
 limit order is an order to buy at no more (or sell at no less) than a 
specific price. This gives you some control over the price at which the 
trade is executed, but may prevent the order from being executed.</p>
                        </div>
                        <div id="SplitTrades" class="CurrencyTradeDetail" style="display: none;">
                            <input id="ctl00_cphRoblox_AllowSplitTradesCheckBox" name="ctl00$cphRoblox$AllowSplitTradesCheckBox" checked="checked" tabindex="3" type="checkbox"><label for="ctl00_cphRoblox_AllowSplitTradesCheckBox">Allow split trades</label>
                        </div>
                        <div id="MarketOrder" class="CurrencyTradeDetail">
                            <div>What I'll get:</div>
                            <p id="EstimatedTrade" style="color: Red;">Estimated Trade: ?</p>
                            <p style="color: Red;">* NOTE: Your money will be held for safe-keeping until either the trade executes or you cancel your position.</p>
                            <p style="font-size: smaller; margin: 15px; text-align: left;">A
 market order is a buy or sell order to be executed immediately at 
current market prices. As long as there are willing sellers and buyers, a
 market order will be filled.</p>
                        </div>
                        <div class="CurrencyTradeDetail">
                            <input name="ctl00$cphRoblox$SubmitTradeButton" value="Submit Trade" onclick='javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("ctl00$cphRoblox$SubmitTradeButton", "", true, "", "", false, false))' id="ctl00_cphRoblox_SubmitTradeButton" tabindex="4" type="submit">
                        </div>
                    </div>
                </div>
            </div>
            <div class="TradingDashboard">
                
	        </div>
        </div>
        <div class="RightColumn">
            <div id="CurrencyOffersPane">
                

<div class="CurrencyOffers">
    <h4>Available RUSTBUX</h4>
    
            <div class="CurrencyOffer">
                18,850 @ 1:3.9023
            </div>
        
            <div class="AlternatingCurrencyOffer">
                400 @ 1:3.9975
            </div>
        
            <div class="CurrencyOffer">
                8,144 @ 1:3.9998
            </div>
        
            <div class="AlternatingCurrencyOffer">
                50 @ 1:4
            </div>
        
            <div class="CurrencyOffer">
                15 @ 1:4
            </div>
        
            <div class="AlternatingCurrencyOffer">
                15 @ 1:4
            </div>
        
            <div class="CurrencyOffer">
                5 @ 1:4
            </div>
        
            <div class="AlternatingCurrencyOffer">
                2,000 @ 1:4
            </div>
        
            <div class="CurrencyOffer">
                3 @ 1:4
            </div>
        
            <div class="AlternatingCurrencyOffer">
                20 @ 1:4
            </div>
        
            <div class="CurrencyOffer">
                25 @ 1:4
            </div>
        
            <div class="AlternatingCurrencyOffer">
                10 @ 1:4
            </div>
        
            <div class="CurrencyOffer">
                10 @ 1:4
            </div>
        
            <div class="AlternatingCurrencyOffer">
                10 @ 1:4
            </div>
        
            <div class="CurrencyOffer">
                10 @ 1:4
            </div>
        
            <div class="AlternatingCurrencyOffer">
                5 @ 1:4
            </div>
        
            <div class="CurrencyOffer">
                20 @ 1:4
            </div>
        
            <div class="AlternatingCurrencyOffer">
                25 @ 1:4
            </div>
        
            <div class="CurrencyOffer">
                1,200 @ 1:4
            </div>
        
            <div class="AlternatingCurrencyOffer">
                10 @ 1:4
            </div>
        
    
</div>
            </div>
        </div>
        <div style="clear: both;"></div>
    </div>
    
    <div id="ctl00_cphRoblox_TradeCurrencyPopupPanel" class="modalPopup" style="display: none">
	
		<div id="ctl00_cphRoblox_TradeCurrencyPopupUpdatePanel">
		
				
			
	</div>
	
</div>
	
	<input name="ctl00$cphRoblox$HiddenField1" id="ctl00_cphRoblox_HiddenField1" type="hidden">
	<input name="ctl00$cphRoblox$HiddenField2" id="ctl00_cphRoblox_HiddenField2" type="hidden">
	<input name="ctl00$cphRoblox$HiddenField3" id="ctl00_cphRoblox_HiddenField3" type="hidden">
	
	
	<script language="javascript">
	    function EstimateTrade() {
	        if ($get('ctl00_cphRoblox_MarketOrderRadioButton').checked) {

	            var amountToTrade = $get('ctl00_cphRoblox_HaveAmountTextBox').value;
	            var element = document.getElementById('EstimatedTrade');
	            if (amountToTrade == "") {
	                element.innerHTML = "";
	                return;
	            }

	            var wantBox = $get('ctl00_cphRoblox_WantAmountTextBox');

	            var onBux = function(result, context) {
	                element.innerHTML = 'Estimated Trade: ' + result + ' R$';
	                wantBox.value = -1;
	            };
	            
	            var onTix = function(result, context) {
	                element.innerHTML = 'Estimated Trade: ' + result + ' Tx';
	                wantBox.value = -1;
	            };

                var onError = function(result, context) {
                    element.innerHTML = 'Unable to estimate at this time.';
                    wantBox.value = -1;
                };

                var isBux = $get('ctl00_cphRoblox_HaveCurrencyDropDownList').selectedIndex == 0;
                if (isBux)
                    EconomyServices.GetEstimatedTradeReturnForTickets(amountToTrade, onBux, onError, this);
                else
                    EconomyServices.GetEstimatedTradeReturnForRobux(amountToTrade, onTix, onError, this);
	        }
	    }
        // -->
    </script>

        </div>
<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php");
?>