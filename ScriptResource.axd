var _____WB$wombat$assign$function_____ = function(name) {return (self._wb_wombat && self._wb_wombat.local_init && self._wb_wombat.local_init(name)) || self[name]; };
if (!self.__WB_pmw) { self.__WB_pmw = function(obj) { this.__WB_source = obj; return this; } }
{
  let window = _____WB$wombat$assign$function_____("window");
  let self = _____WB$wombat$assign$function_____("self");
  let document = _____WB$wombat$assign$function_____("document");
  let location = _____WB$wombat$assign$function_____("location");
  let top = _____WB$wombat$assign$function_____("top");
  let parent = _____WB$wombat$assign$function_____("parent");
  let frames = _____WB$wombat$assign$function_____("frames");
  let opener = _____WB$wombat$assign$function_____("opener");

RobloxEventManager = new function () {
    var cookieStoreEvents = [];
    var dataStore = {};
    this.enabled = false;
    this.initialized = false;
    this.eventQueue = [];

    function getCookieValue(cookieName) {
        var regex = new RegExp(cookieName + '=([^;]*)');
        var match = regex.exec(document.cookie);

        if (match)
            return match[1];

        return null;
    }
    function parseDotNetCookie(cookieValue) {
        var cookieObject = {};
        var keyVals = cookieValue.split('&');
        for (var i = 0; i < keyVals.length; i++) {
            var keyVal = keyVals[i].split('=');
            cookieObject[keyVal[0]] = keyVal[1];
        }
        return cookieObject;
    }
    function getDotNetCookie(name) {
        var value = getCookieValue(name);
        if (value)
            return parseDotNetCookie(value);

        return null;
    }

    this.initialize = function (enabled) {
        this.initialized = true;
        this.enabled = enabled;
        while (this.eventQueue.length > 0) {
            var event = this.eventQueue.pop();
            this.triggerEvent(event.eventName, event.args);
        }
    }

    this.getMarketingGuid = function () {
        var c = getDotNetCookie('RBXEventTracker');
        if (c != null)
            return c['browserid'];
        return -1;
    }

    this.triggerEvent = function (eventName, args) {
        if (this.initialized) {
            if (this.enabled) {
                if (typeof args === 'undefined')
                    args = {};
                args.guid = this.getMarketingGuid();
                if (args.guid != -1)
                    $(document).trigger(eventName, [args]);
            }
        } else {
            this.eventQueue.push({ eventName: eventName, args: args });
        }
    }

    this.registerCookieStoreEvent = function (eventName) {
        cookieStoreEvents.push(eventName);
    }

    this.insertDataStoreKeyValuePair = function (key, value) {
        dataStore[key] = value;
    }

    this.monitorCookieStore = function () {
        try {
            if (typeof Roblox === "undefined" || typeof Roblox.Client === "undefined" || window.location.protocol == "https:")
                return;

            var plugin = Roblox.Client.CreateLauncher(false);
            if (plugin == null)
                return;

            for (var i = 0; i < cookieStoreEvents.length; i++) {
                try {
                    var eventName = cookieStoreEvents[i];
                    var storedValue = plugin.GetKeyValue(eventName);
                    
                    if (storedValue != '' && storedValue != 'RBX_NOT_VALID') {
                        var args = eval('(' + storedValue + ')');   // has userId and placeId
                        args['userType'] = args['userId'] > 0 ? 'user' : 'guest';
                        this.triggerEvent(eventName, args);
                        plugin.SetKeyValue(eventName, 'RBX_NOT_VALID');
                    }
                }
                catch (err) {
                
                }
            }
            
            Roblox.Client.ReleaseLauncher(plugin, false, false);
        }
        catch (err) {
            // If we update in the middle of checking cookies, let the monitor do the remaining cookies at the next interval
        }
    }
}

function RBXBaseEventListener() {
    this.init = function () {
        for (eventKey in this.events)
            $(document).bind(this.events[eventKey], $.proxy(this.handleEvent, this));
    };
    this.events = [];
    
    /*
     * INTERFACE FUNCTIONS
     */
    this.distillData = function (data, mapping) {
        console.log('RBXEventListener distillData - Please implement me');
        return false;
    }
    this.handleEvent = function (event) {
        console.log('EventListener handleEvent - Please implement me');
        return false;
    }
    this.fireEvent = function (evtStr) {
        console.log('EventListener fireEvent - Please implement me');
        return false;
    }
}

RobloxListener = new RBXBaseEventListener();
RobloxListener.handleEvent = function (event, data) {
    var rEvent, rData, dataMap;

    switch (event.type) {
        case 'rbx_evt_install_begin':
            dataMap = { guid: 'guid', userId: 'userid' };
            rEvent = event.type;
            break;
        case 'rbx_evt_initial_install_start':
            dataMap = { guid: 'guid', userId: 'userid' };
            rEvent = event.type;
            break;
        case 'rbx_evt_ftp':
            dataMap = { guid: 'guid', userId: 'userid' };
            rEvent = event.type;
            break;
        case 'rbx_evt_initial_install_success':
            dataMap = { guid: 'guid', userId: 'userid' };
            rEvent = event.type;
            break;
        case 'rbx_evt_fmp':
            dataMap = { guid: 'guid', userId: 'userid' };
            rEvent = event.type;
            break;
        default:
            console.log('RobloxEventListener - Event registered without handling instructions: ' + event.type);
            return false;
    }

    rData = this.distillData(data, dataMap);
    this.fireEvent(this.eventToString(rEvent, rData));
    return true;
}

RobloxListener.distillData = function (data, mapping) {
    var distilled = {};
    for (dataKey in mapping) {
        if (typeof (data[dataKey]) != typeof (undefined))
            distilled[mapping[dataKey]] = encodeURIComponent(data[dataKey]);
    }

    return distilled;
}
RobloxListener.eventToString = function (event, args) {
    var eventString = RobloxListener.restUrl;
    eventString += "?event=" + event + "&";
    if (args != null) {
        for (arg in args) {
            if (typeof (arg) != typeof (undefined) && args.hasOwnProperty(arg))
                eventString += arg + "=" + args[arg] + "&";
        }
    }
    eventString = eventString.slice(0, eventString.length - 1);
    return eventString;
}
RobloxListener.fireEvent = function (processedEvent) {
    var trPixel = $('<img width="1" height="1" src="' + processedEvent + '"/>');
}
RobloxListener.events = [
    'rbx_evt_install_begin',
    'rbx_evt_initial_install_start',
    'rbx_evt_ftp',
    'rbx_evt_initial_install_success',
    'rbx_evt_fmp'
];
KontagentListener = new RBXBaseEventListener();
KontagentListener.restUrl = "";
KontagentListener.APIKey = "";
KontagentListener.StagingAPIKey = "";
KontagentListener.StagingEvents = [];

KontagentListener.handleEvent = function (event, data) {
    function translateOsString(str) {
        str = str.toLowerCase();
        if (str == "win32")
            str = "Windows";
        else if (str == "osx")
            str = "Mac";
        return str;
    }

    var kEvent, kData, dataMap, staging, APIKey;
    kEvent = 'evt';

    switch (event.type) {
        case 'rbx_evt_pageview':
            dataMap = { guid: 's', path: 'u', ts: 'ts', user_ip: 'ip' };
            kEvent = 'pgr';
            break;
        case 'rbx_evt_userinfo':
            dataMap = { guid: 's', age: 'b', gender: 'g' }
            kEvent = 'cpu';
            break;
        case 'rbx_evt_ecomm_item':
            data['total'] = Math.round(data['total'] * 100);
            data['productName'] = data['productName'].replace(/\s/g, "").replace("Outrageous", "O").replace("Turbo", "T").replace("Builders", "B").replace("Club", "C");
            dataMap = { guid: 's', total: 'v', provider: 'st1', category: 'st2', productName: 'st3', type: 'tu' }
            kEvent = 'mtu';
            break;
        case 'rbx_evt_ftp':
            // Prepare and Fire APA Event
            data['tracking'] = '';
            data['shorttracking'] = '';
            dataMap = { guid: 's', trackingtag: 'u', shorttracking: 'su' };
            kData = this.distillData(data, dataMap);
            kEvent = 'apa';
            this.fireEvent(this.eventToString(event.type, kEvent, kData));

            // Prepare and Fire funnel event
            data['eventName'] = 'Install Success Funnel';
            data['eventType'] = 'Install Success Funnel';
            data['os'] = translateOsString(data['os']);
            dataMap = { guid: 's', eventType: 'st1', os: 'st2', userType: 'st3', eventName: 'n' };
            kData = this.distillData(data, dataMap);
            kEvent = 'evt';
            this.fireEvent(this.eventToString(event.type, kEvent, kData));

            // Prepare place tracking event - fired after switch statement
            data['eventType'] = 'Install Success Place';
            dataMap = { guid: 's', eventType: 'st1', os: 'st2', userType: 'st3', placeId: 'n' };
            break;
        case 'rbx_evt_initial_install_success':
            // Prepare and Fire APA Event
            data['tracking'] = '';
            data['shorttracking'] = '';
            dataMap = { guid: 's', trackingtag: 'u', shorttracking: 'su' };
            kData = this.distillData(data, dataMap);
            kEvent = 'apa';
            this.fireEvent(this.eventToString(event.type, kEvent, kData));

            // Prepare and Fire funnel event
            data['eventName'] = 'Bootstrapper Install Success Funnel';
            data['eventType'] = 'Bootstrapper Install Success Funnel';
            data['os'] = translateOsString(data['os']);
            dataMap = { guid: 's', eventType: 'st1', os: 'st2', userType: 'st3', eventName: 'n' };
            kData = this.distillData(data, dataMap);
            kEvent = 'evt';
            this.fireEvent(this.eventToString(event.type, kEvent, kData));

            // Prepare place tracking event - fired after switch statement
            data['eventType'] = 'Bootstrapper Install Success Place';
            dataMap = { guid: 's', eventType: 'st1', os: 'st2', userType: 'st3', placeId: 'n' };
            break;
        case 'rbx_evt_install_begin':
            data['eventName'] = 'Install Begin';
            data['eventType'] = "Install Begin"
            dataMap = { guid: 's', eventType: 'st1', os: 'st2', eventName: 'n' };
            break;
        case 'rbx_evt_initial_install_start':
            data['eventName'] = 'Bootstrapper Install Begin';
            data['eventType'] = "Bootstrapper Install Begin"
            dataMap = { guid: 's', eventType: 'st1', os: 'st2', eventName: 'n' };
            break;
        case 'rbx_evt_fmp':
            // Prepare and Fire funnel event
            data['eventName'] = 'Five Minute Play Funnel';
            data['eventType'] = 'Five Minute Play Funnel';
            data['os'] = translateOsString(data['os']);
            dataMap = { guid: 's', eventType: 'st1', os: 'st2', userType: 'st3', eventName: 'n' };
            kData = this.distillData(data, dataMap);
            this.fireEvent(this.eventToString(event.type, kEvent, kData));

            // Prepare place tracking event - fired after switch statement
            data['eventType'] = 'Five Minute Play Place';
            dataMap = { guid: 's', eventType: 'st1', os: 'st2', userType: 'st3', placeId: 'n' };
            break;
        case 'rbx_evt_play_user':
            data['eventName'] = 'Play User';
            data['eventType'] = 'Play User';
            data['gender'] = data['gender'];
            dataMap = { guid: 's', eventType: 'st1', gender: 'st2', age: 'st3', placeId: 'l', eventName: 'n' };
            break;
        case 'rbx_evt_play_guest':
            data['eventName'] = 'Play Guest';
            data['eventType'] = 'Play Guest';
            data['gender'] = data['gender'];
            dataMap = { guid: 's', eventType: 'st1', gender: 'st2', placeId: 'l', eventName: 'n' };
            break;
        case 'rbx_evt_signup':
            data['eventName'] = 'Sign Up Funnel';
            data['eventType'] = 'Sign Up Funnel';
            dataMap = { guid: 's', eventType: 'st1', eventName: 'n' };
            kData = this.distillData(data, dataMap);
            kEvent = 'evt';
            this.fireEvent(this.eventToString(event.type, kEvent, kData));

            data['eventName'] = 'Sign Up';
            data['eventType'] = 'Sign Up';
            data['gender'] = data['gender'];
            dataMap = { guid: 's', eventType: 'st1', gender: 'st2', age: 'st3', eventName: 'n' };
            break;
        case 'rbx_evt_ecomm_custom':
            data['eventType'] = 'Purchase';
            data['productName'] = data['productName'].replace(/\s/g, "").replace("Outrageous", "O").replace("Turbo", "T").replace("Builders", "B").replace("Club", "C");
            dataMap = { guid: 's', eventType: 'st1', provider: 'st2', category: 'st3', productName: 'n' }
            break;
        case 'rbx_evt_abtest':
            dataMap = { guid: 's', experiment: 'st1', variation: 'n' }
            break;
        case 'rbx_evt_pageview_custom':
            data['eventName'] = data['page'];
            if (typeof data['userType'] === "undefined")
                dataMap = { guid: 's', page: 'st1', eventName: 'n' }
            else
                dataMap = { guid: 's', page: 'st1', userType: 'st2', eventName: 'n' }
            break;
        case 'rbx_evt_generic':
            // Use for all events that doesn't need extra data. Can also be used if extra data needs to be sent
            data['eventName'] = data['type'];
            dataMap = { guid: 's', type: 'st1', eventName: 'n' }
            if (typeof data['opt1'] != "undefined")
                dataMap.opt1 = 'st2';
            if (typeof data['opt2'] != "undefined" && typeof data['opt1'] != "undefined")
                dataMap.opt2 = 'st3';
            break;
        case 'rbx_evt_source_tracking':
            data['installed'] = 0;
            data['sourceType'] = 'ad';
            dataMap = { guid: 's', sourceType: 'tu', installed: 'i', source: 'st1', campaign: 'st2', medium: 'st3' }
            kEvent = 'ucc';
            break;
        case 'rbx_evt_card_redemption':
            data['eventType'] = "CardRedemption";
            data['eventName'] = "CardRedemption";
            dataMap = { guid: 's', eventType: 'st1', merchant: 'st2', cardValue: 'st3', eventName: 'n' };
            break;
        case 'rbx_evt_popup_action':
            data['eventType'] = "GuestPlayPopupAction";
            data['eventName'] = "GuestPlayPopupAction";
            dataMap = { guid: 's', eventType: 'st1', action: 'st2', eventName: 'n' };
            break;
        default:
            console.log('KontagentListener - Event registered without handling instructions: ' + event.type);
            return false;
    }

    kData = this.distillData(data, dataMap);
    this.fireEvent(this.eventToString(event.type, kEvent, kData));
    return true;
}

KontagentListener.distillData = function (data, mapping) {
    var distilled = {};
    for (dataKey in mapping) {
        if (typeof (data[dataKey]) != typeof (undefined))
            distilled[mapping[dataKey]] = encodeURIComponent(data[dataKey]);
    }

    return distilled;
}
KontagentListener.eventToString = function (type, event, args) {
    var eventString = KontagentListener.restUrl;
    var APIKey = this.isStagingEvent(type, args) ? KontagentListener.StagingAPIKey : KontagentListener.APIKey;
    eventString += APIKey + "/" + event + "/?";
    if (args != null) {
        for (arg in args) {
            if (typeof (arg) != typeof (undefined) && args.hasOwnProperty(arg))
                eventString += arg + "=" + args[arg] + "&";
        }
    }
    eventString = eventString.slice(0, eventString.length - 1);
    return eventString;
}
KontagentListener.isStagingEvent = function (event, args) {
    staging = false;
    try {
        for (var index in this.StagingEvents) {
            var stagingEvent = this.StagingEvents[index];
            if (typeof stagingEvent === 'string') {
                if (event == stagingEvent) {
                    staging = true;
                    break;
                }
            } else if (typeof stagingEvent === 'object') {
                if (typeof stagingEvent[event] !== "undefined" && stagingEvent[event] == args['st1']) {
                    staging = true;
                    break;
                }
            }
        }
    } catch (ex) { }
    return staging;
}
KontagentListener.fireEvent = function (processedEvent) {
    var trPixel = $('<img width="1" height="1" src="' + processedEvent + '"/>');
}
KontagentListener.events = [
    'rbx_evt_pageview',
    'rbx_evt_install_begin',
    'rbx_evt_initial_install_start',
    'rbx_evt_ftp',
    'rbx_evt_initial_install_success',
    'rbx_evt_fmp',
    'rbx_evt_play_user',
    'rbx_evt_play_guest',
    'rbx_evt_signup',
    'rbx_evt_ecomm_item',
    'rbx_evt_ecomm_custom',
    'rbx_evt_userinfo',
    'rbx_evt_abtest',
    'rbx_evt_pageview_custom',
    'rbx_evt_generic',
    'rbx_evt_source_tracking',
    'rbx_evt_card_redemption',
    'rbx_evt_popup_action'
];

GoogleListener = new RBXBaseEventListener();
GoogleListener.handleEvent = function (event, data) {
    function translateOsString(str) {
        str = str.toLowerCase();
        if (str == "win32")
            str = "Windows";
        else if (str == "osx")
            str = "Mac";
        return str;
    }

    var gEvent, gData, dataMap;

    switch (event.type) {
        case 'rbx_evt_initial_install_begin':
            data['os'] = translateOsString(data['os']);
            data['category'] = 'Bootstrapper Install Begin';
            dataMap = { os: 'action' };
            break;
        case 'rbx_evt_ftp':
            data['os'] = translateOsString(data['os']);
            data['category'] = 'Install Success';
            dataMap = { os: 'action' };
            break;
        case 'rbx_evt_initial_install_success':
            data['os'] = translateOsString(data['os']);
            data['category'] = 'Bootstrapper Install Success';
            dataMap = { os: 'action' };
            break;
        case 'rbx_evt_fmp':
            data['os'] = translateOsString(data['os']);
            data['category'] = 'Five Minute Play';
            dataMap = { os: 'action' };
            break;
        case 'rbx_evt_abtest':
            dataMap = { experiment: 'category', variation: 'action', version: 'opt_label' };
            break;
        case 'rbx_evt_card_redemption':
            data['category'] = "CardRedemption";
            dataMap = { merchant: 'action', cardValue: 'opt_label' };
            break;
        default:
            console.log('GoogleListener - Event registered without handling instructions: ' + event.type);
            return false;
    }

    dataMap['category'] = 'category';

    gData = this.distillData(data, dataMap);
    this.fireEvent(gData);
    return true;
}

GoogleListener.distillData = function (data, mapping) {
    var distilled = {};
    for (dataKey in mapping) {
        if (typeof (data[dataKey]) != typeof (undefined))
            distilled[mapping[dataKey]] = data[dataKey];
    }
    var eventParams = [distilled['category'], distilled['action']];
    if (distilled['opt_label'] != null) {
        eventParams = eventParams.concat(distilled['opt_label']);
    }
    if (distilled['opt_value'] != null) {
        eventParams = eventParams.concat(distilled['opt_value']);
    }

    return eventParams;
}
GoogleListener.fireEvent = function (processedEvent) {
    if (typeof (_gaq) != typeof (undefined)) {
        var eventsArray = ["_trackEvent"];
        var eventsArrayB = ["b._trackEvent"];
        _gaq.push(eventsArray.concat(processedEvent));
        _gaq.push(eventsArrayB.concat(processedEvent));
    }
}
GoogleListener.events = [
    'rbx_evt_initial_install_begin',
    'rbx_evt_ftp',
    'rbx_evt_initial_install_success',
    'rbx_evt_fmp',
    'rbx_evt_abtest',
    'rbx_evt_card_redemption'
];

}