<div id="__ajax_title" style="display: none">Settings</div>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    @if(Auth::user()->chat_role < 3)
        This information is not available to you.
    @else
        <div class="row">
            <div class="col-lg-4">
                <div class="kt-portlet" id="paysys">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                            Payment system <small>freekassa</small>
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group">
                                <label>ID:</label>
                                <input id="paysys_id" value="{{$settings->ap_id}}" type="text" class="form-control" placeholder="ID"
                                    oninput="delayedv('#paysys_id', function(v) { send('#paysys', '/admin/setting/ap_id/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Secret word #1:</label>
                                <input id="paysys_secret" value="{{$settings->ap_secret}}" type="text" class="form-control" placeholder="Секретный ключ"
                                    oninput="delayedv('#paysys_secret', function(v) { send('#paysys', '/admin/setting/ap_secret/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Secret word #2:</label>
                                <input id="paysys_api" value="{{$settings->ap_api_key}}" type="text" class="form-control" placeholder="API ключ"
                                   oninput="delayedv('#paysys_api', function(v) { send('#paysys', '/admin/setting/ap_api_key/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Minimum amount for deposit:</label>
                                <input id="paysys_minin" value="{{$settings->min_in}}" type="text" class="form-control" placeholder="Minimum amount for deposit"
                                       oninput="delayedv('#paysys_minin', function(v) { send('#paysys', '/admin/setting/min_in/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Minimum amount for withdrawal:</label>
                                <input id="paysys_minwith" value="{{$settings->min_with}}" type="text" class="form-control" placeholder="Minimum amount for withdrawal"
                                    oninput="delayedv('#paysys_minwith', function(v) { send('#paysys', '/admin/setting/min_with/'+v) })">
                            </div>
							<div class="form-group">
                                <label>Minimum deposit amount for withdrawal:</label>
                                <input id="min_withdraw_dep" value="{{$settings->min_withdraw_dep}}" type="text" class="form-control" placeholder="Minimum deposit amount for withdrawal"
                                    oninput="delayedv('#min_withdraw_dep', function(v) { send('#paysys', '/admin/setting/min_withdraw_dep/'+v) })">
                            </div>
                            <div class="form-group">
                                <label class="kt-checkbox">
                                    <input id="paysys_enabled" @if($settings['payment_disabled'] == 1) checked @endif type="checkbox"
                                           onclick="send('#paysys', '/admin/setting/payment_disabled/'+($('#paysys_enabled').is(':checked') ? '1' : '0'))"> Disable payment acceptance from users
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
				                <div class="kt-portlet" id="bots">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Fake bet management
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group">
                                <label>Minimum fake bet</label>
                                <input id="bots_minfakebet" type="text" value="{{$settings->minfakebet}}" class="form-control" placeholder="Fake bot bet amount, min. 0"
                                    oninput="delayedv('#bots_minfakebet', function(v) { send('#bots', '/admin/setting/minfakebet/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Maximum fake bet</label>
                                <input id="bots_maxfakebet" type="text" value="{{$settings->maxfakebet}}" class="form-control" placeholder="Fake bot bet amount, max. 1M"
                                    oninput="delayedv('#bots_maxfakebet', function(v) { send('#bots', '/admin/setting/maxfakebet/'+v) })">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="kt-portlet" id="ref">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                            Affiliate program
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group">
                                <label>Amount for an active referral/registration through a referral link</label>
                                <input id="ref_sum" type="text" value="{{$settings->promo_sum}}" class="form-control" placeholder="Amount for a referral code"
                                    oninput="delayedv('#ref_sum', function(v) { send('#ref', '/admin/setting/promo_sum/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Amount for a temporary promo code</label>
                                <input id="temp_sum" type="text" value="{{$settings->temp_promo_sum}}" class="form-control" placeholder="Amount for a referral code"
                                    oninput="delayedv('#temp_sum', function(v) { send('#ref', '/admin/setting/temp_promo_sum/'+v) })">
                            </div>
                        </div>
                    </div>
                </div>
				<div class="kt-portlet" id="site">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                            Website
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group">
                                <label>Website name:</label>
                                <input id="namesite" value="{{$settings['namesite']}}" type="text" class="form-control" placeholder="Website name"
                                    oninput="delayedv('#namesite', function(v) { send('#site', '/admin/setting/namesite/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>VK group</label>
                                <input id="vk_url" value="{{$settings['vk_url']}}" type="text" class="form-control" placeholder="VK group, example: uptouch"
                                    oninput="delayedv('#vk_url', function(v) { send('#site', '/admin/setting/vk_url/'+v) })">
                            </div>
							<div class="form-group">
                                <label>Telegram link:</label>
                                <input id="telegram_url" value="{{$settings['telegram_url']}}" type="text" class="form-control" placeholder="Telegram link, example: teleg.gh/test"
                                    oninput="delayedv('#telegram_url', function(v) { send('#site', '/admin/setting/telegram_url/'+v) })">
                            </div>
							<div class="form-group">
                                <label>Website email:</label>
                                <input id="support_email" value="{{$settings['support_email']}}" type="text" class="form-control" placeholder="Website email"
                                    oninput="delayedv('#support_email', function(v) { send('#site', '/admin/setting/support_email/'+v) })">
                            </div>
							<div class="form-group">
                                <label>Keywords:</label>
                                <input id="keywords" value="{{$settings['keywords']}}" type="text" class="form-control" placeholder="Keywords"
                                    oninput="delayedv('#keywords', function(v) { send('#site', '/admin/setting/keywords/'+v) })">
                            </div>
							<div class="form-group">
                                <label class="kt-checkbox">
                                    <input id="build" @if($settings['build'] == 1) checked @endif type="checkbox"
                                        onclick="send('#build', '/admin/setting/build/'+($('#build').is(':checked') ? '1' : '0'))"> Server build (debug/release)
                                    <span></span>
                                </label>
                            </div>
							                            <div class="form-group">
                                <label class="kt-checkbox">
                                    <input id="techworks" @if($settings['techworks'] == 1) checked @endif type="checkbox"
                                        onclick="send('#techworks', '/admin/setting/techworks/'+($('#techworks').is(':checked') ? '1' : '0'))"> Technical work (Disable site)
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="kt-portlet" id="warn">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                            Settings
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group">
                                <label>Подкрутить, если достигнут % от ставки</label>
                                <input id="max_bet_increase" value="{{$settings->max_bet_increase}}" type="text" class="form-control" placeholder="Максимальный % от ставки"
                                       oninput="delayedv('#max_bet_increase', function(v) { send('#warn', '/admin/setting/max_bet_increase/'+v) })">
                            </div>
							<div class="form-group">
                                <label>Системный ключ бота (чата)</label>
                                <input id="system_key" value="{{$settings->system_key}}" type="text" class="form-control" placeholder="Любой набор цифр и букв"
                                       oninput="delayedv('#system_key', function(v) { send('#warn', '/admin/setting/system_key/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Сообщения - секретный ключ <strong>группы</strong></label>
                                <input id="messages_secret" value="{{$settings->messages_secret}}" type="text" class="form-control" placeholder="Секретный ключ"
                                       oninput="delayedv('#messages_secret', function(v) { send('#warn', '/admin/setting/messages_secret/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Информация - сервисный ключ <strong>приложения</strong></label>
                                <input id="service" value="{{$settings->vk_service}}" type="text" class="form-control" placeholder="Сервисный ключ"
                                       oninput="delayedv('#service', function(v) { send('#warn', '/admin/setting/vk_service/'+v) })">
                            </div>
                            <h5>Уведомление на главной странице</h5>
                            <div class="form-group">
                                <label>Заголовок:</label>
                                <input id="warn_title" value="{{$settings['warn_title']}}" type="text" class="form-control" placeholder="Заголовок"
                                    oninput="delayedv('#warn_title', function(v) { send('#warn', '/admin/setting/warn_title/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Текст:</label>
                                <input id="warn_text" value="{{$settings['warn_text']}}" type="text" class="form-control" placeholder="Текст"
                                    oninput="delayedv('#warn_text', function(v) { send('#warn', '/admin/setting/warn_text/'+v) })">
                            </div>
                            <div class="form-group">
                                <label class="kt-checkbox">
                                    <input id="warn_enabled" @if($settings['warn_enabled'] == 1) checked @endif type="checkbox"
                                        onclick="send('#warn', '/admin/setting/warn_enabled/'+($('#warn_enabled').is(':checked') ? '1' : '0'))"> Включить
                                    <span></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Заголовок:</label>
                                <input id="slide_title" value="{{$settings['slide_title']}}" type="text" class="form-control" placeholder="Заголовок"
                                    oninput="delayedv('#slide_title', function(v) { send('#slide', '/admin/setting/slide_title/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Текст:</label>
                                <input id="slide_text" value="{{$settings['slide_text']}}" type="text" class="form-control" placeholder="Текст"
                                    oninput="delayedv('#slide_text', function(v) { send('#slide', '/admin/setting/slide_text/'+v) })">
                            </div>
                            <div class="form-group">
                                <label class="kt-checkbox">
                                    <input id="slide_enabled" @if($settings['slide_enabled'] == 1) checked @endif type="checkbox"
                                        onclick="send('#slide', '/admin/setting/slide_enabled/'+($('#slide_enabled').is(':checked') ? '1' : '0'))"> Включить
                                    <span></span>
                                </label>
                            </div>
							                            <div class="form-group">
                                <label class="kt-checkbox">
                                    <input id="slider" @if($settings['slider'] == 1) checked @endif type="checkbox"
                                        onclick="send('#slider', '/admin/setting/slider/'+($('#slider').is(':checked') ? '1' : '0'))"> Слайдер на главной странице (вкл/откл)
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			            <div class="col-lg-4">
                <div class="kt-portlet" id="warn">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Авторизация Google
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group">
                                <label>Google client id</label>
                                <input id="google_client_id" value="{{$settings->google_client_id}}" type="text" class="form-control" placeholder="Значение не больше 100 символов"
                                       oninput="delayedv('#google_client_id', function(v) { send('#warn', '/admin/setting/google_client_id/'+v) })">
                            </div>
							<div class="form-group">
                                <label>Google client secret</label>
                                <input id="google_client_secret" value="{{$settings->google_client_secret}}" type="text" class="form-control" placeholder="Значение не больше 100 символов"
                                       oninput="delayedv('#google_client_secret', function(v) { send('#warn', '/admin/setting/google_client_secret/'+v) })">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
						            <div class="col-lg-4">
                <div class="kt-portlet" id="warn">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Авторизация Facebook
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group">
                                <label>Facebook client id</label>
                                <input id="facebook_client_id" value="{{$settings->facebook_client_id}}" type="text" class="form-control" placeholder="Значение не больше 100 символов"
                                       oninput="delayedv('#facebook_client_id', function(v) { send('#warn', '/admin/setting/facebook_client_id/'+v) })">
                            </div>
							<div class="form-group">
                                <label>Facebook client secret</label>
                                <input id="facebook_client_secret" value="{{$settings->facebook_client_secret}}" type="text" class="form-control" placeholder="Значение не больше 100 символов"
                                       oninput="delayedv('#facebook_client_secret', function(v) { send('#warn', '/admin/setting/facebook_client_secret/'+v) })">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-lg-4">
                <div class="kt-portlet" id="warn">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Авторизация Vkontakte
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group">
                                <label>Vk client id</label>
                                <input id="vk_client_id" value="{{$settings->vk_client_id}}" type="text" class="form-control" placeholder="Значение не больше 100 символов"
                                       oninput="delayedv('#vk_client_id', function(v) { send('#warn', '/admin/setting/vk_client_id/'+v) })">
                            </div>
							<div class="form-group">
                                <label>Vk client secret</label>
                                <input id="vk_client_secret" value="{{$settings->vk_client_secret}}" type="text" class="form-control" placeholder="Значение не больше 100 символов"
                                       oninput="delayedv('#vk_client_secret', function(v) { send('#warn', '/admin/setting/vk_client_secret/'+v) })">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>