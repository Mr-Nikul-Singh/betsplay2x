!(function (e) {
    var i = {};
    function t(o) {
        if (i[o]) return i[o].exports;
        var a = (i[o] = { i: o, l: !1, exports: {} });
        return e[o].call(a.exports, a, a.exports, t), (a.l = !0), a.exports;
    }
    (t.m = e),
        (t.c = i),
        (t.d = function (e, i, o) {
            t.o(e, i) || Object.defineProperty(e, i, { enumerable: !0, get: o });
        }),
        (t.r = function (e) {
            "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(e, "__esModule", { value: !0 });
        }),
        (t.t = function (e, i) {
            if ((1 & i && (e = t(e)), 8 & i)) return e;
            if (4 & i && "object" == typeof e && e && e.__esModule) return e;
            var o = Object.create(null);
            if ((t.r(o), Object.defineProperty(o, "default", { enumerable: !0, value: e }), 2 & i && "string" != typeof e))
                for (var a in e)
                    t.d(
                        o,
                        a,
                        function (i) {
                            return e[i];
                        }.bind(null, a)
                    );
            return o;
        }),
        (t.n = function (e) {
            var i =
                e && e.__esModule
                    ? function () {
                          return e.default;
                      }
                    : function () {
                          return e;
                      };
            return t.d(i, "a", i), i;
        }),
        (t.o = function (e, i) {
            return Object.prototype.hasOwnProperty.call(e, i);
        }),
        (t.p = "/"),
        t((t.s = 15));
})({
    15: function (e, i, t) {
        e.exports = t("DSS0");
    },
    DSS0: function (e, i) {
        $.on("/user", function () {
            var e = 0,
                i = null;
            (window.loadNextPage = function (i) {
                (e += 1),
                    $.get("/api/user_drops/" + i + "/" + e, function (e) {
                        var i = JSON.parse(e);
                        0 === i.length && $("#lm_b").hide();
                        for (var t = 0; t < i.length; t++) {
                            var o = i[t],
                                a = $(
                                    '<tr class="live_table-game"><th><div class="ll_icon hidden-xs" onclick="load(\'' +
                                        o.name.toLowerCase() +
                                        '\')"><i class="' +
                                        o.icon +
                                        '"></i></div><div class="ll_game"><span onclick="load(\'' +
                                        o.name.toLowerCase() +
                                        "')\">" +
                                        o.name +
                                        '</span><p onclick="user_game_info(' +
                                        o.id +
                                        ')">Просмотр</p></div></th><th class="hidden-xs">' +
                                        (null == o.time ? "" : o.time) +
                                        '</th><th class="hidden-xs">' +
                                        o.bet +
                                        '&nbsp;<i class="fad fa-coins"></i></th><th class="hidden-xs">' +
                                        (o.user_id > 0 ? "x" + o.mul : "") +
                                        "</th><th>" +
                                        o.amount +
                                        '&nbsp;<i class="fad fa-coins"></i></th></tr>'
                                );
                            $("#user_drops tbody").append(a.fadeIn("fast").css("display", "table-row"));
                        }
                    });
            }),
                (window.setTab = function (e, t) {
                    (e !== i || (void 0 !== t && !1 !== t)) &&
                        ((i = e),
                        $("*[data-tab]").toggleClass("user-info-tab-active", !1),
                        $("*[data-tab=" + e + "]").toggleClass("user-info-tab-active", !0),
                        $(".user_tab").hide(),
                        $("#" + e).fadeIn("fast"),
                        "achievements" === e && ($("#achievements_content").html(""), $(".nano").nanoScroller(), loadAchievements("all")));
                }),
                (window.client_seed_change_prompt_user = function () {
                    $(".pf .iziToast-close").click(),
                        iziToast.show({
                            backgroundColor: "#1c1e23",
                            progressBar: !1,
                            theme: "dark",
                            overlay: !0,
                            drag: !1,
                            displayMode: 1,
                            pauseOnHover: !1,
                            timeout: !1,
                            message: "After changing the client hash, all results of previous games will become invalid!",
                            class: "csp",
                            position: "center",
                            buttons: [
                                [
                                    "<button><b>Continue</b></button>",
                                    function (e, i) {
                                        $(".csp .iziToast-close").click(),
                                            iziToast.question({
                                                rtl: !1,
                                                layout: 1,
                                                class: "mm pf",
                                                theme: "dark",
                                                backgroundColor: "#1c1e23",
                                                drag: !1,
                                                timeout: !1,
                                                close: !0,
                                                overlay: !0,
                                                displayMode: 1,
                                                progressBar: !1,
                                                icon: !1,
                                                title: !1,
                                                message:
                                                    '<div class="auth_dlg" style="height: 262px"><div class="auth_header mm_header"><i class="fad fa-shield-alt"></i> Fair play</div><div class="auth_content"><div class="login"><div class="login_title" style="height: 57px"><span id="l_a" class="pf_title">Client hash change, the entered value will be encrypted.</span></div><div class="login_fields pf_fields"><div class="login_fields__user"><div class="icon"><img class="pf_hi" src="/img/hash-key.png"></div><input id="nch" placeholder="Hash" type="text"><div class="validation"><img src="/img/tick.png"></div></input></div><div class="validation"><img src="/img/tick.png"></div></div><div class="login_fields__submit pf_submit" style="top: 162px!important;"><input id="cc" type="submit" value="Change"></div></div></div></div></div>',
                                                position: "center",
                                            }),
                                            $("#cc").on("click", function () {
                                                $("#nch").val().length < 5
                                                    ? iziToast.error({ message: "The hash must contain at least 5 characters.", position: "bottomCenter", icon: "fa fa-times" })
                                                    : $.get("/change_client_seed/" + $("#nch").val(), function () {
                                                          window.location.reload();
                                                      });
                                            });
                                    },
                                ],
                                [
                                    "<button><b>Cancel</b></button>",
                                    function (e, i) {
                                        $(".csp .iziToast-close").click();
                                    },
                                ],
                            ],
                        });
                }),
                (window.client_email_change_prompt = function () {
                    $(".pf .iziToast-close").click(),
                        iziToast.show({
                            backgroundColor: "#1c1e23",
                            progressBar: !1,
                            theme: "dark",
                            overlay: !0,
                            drag: !1,
                            displayMode: 1,
                            pauseOnHover: !1,
                            timeout: !1,
                            message: "After changing the email, all site messages will be sent to the provided email!",
                            class: "csp",
                            position: "center",
                            buttons: [
                                [
                                    "<button><b>Continue</b></button>",
                                    function (e, t) {
                                        $(".csp .iziToast-close").click(),
                                            iziToast.question({
                                                rtl: !1,
                                                layout: 1,
                                                class: "mm pf",
                                                theme: "dark",
                                                backgroundColor: "#1c1e23",
                                                drag: !1,
                                                timeout: !1,
                                                close: !0,
                                                overlay: !0,
                                                displayMode: 1,
                                                progressBar: !1,
                                                icon: !1,
                                                title: !1,
                                                message:
                                                    '<div class="auth_dlg" style="height: 262px"><div class="auth_header mm_header"><i class="fad fa-shield-alt"></i> Email</div><div class="auth_content"><div class="login"><div class="login_title" style="height: 57px"><span id="l_a" class="pf_title">Changing the email address.</span></div><div class="login_fields pf_fields"><div class="login_fields__user"><div class="icon"><img class="pf_hi" src="/img/hash-key.png"></div><input id="nch" placeholder="email" type="text"><div class="validation"><img src="/img/tick.png"></div></input></div><div class="validation"><img src="/img/tick.png"></div></div><div class="login_fields__submit pf_submit" style="top: 162px!important;"><input id="cc" type="submit" value="Change"></div></div></div></div></div>',
                                                position: "center",
                                            }),
                                            $("#cc").on("click", function () {
                                                $("#nch").val().length < 6
                                                    ? iziToast.error({ message: "The email must be specified correctly.", position: "bottomCenter", icon: "fa fa-times" })
                                                    : $.get("/change_client_email/" + $("#nch").val(), function (e) {
                                                          var t = JSON.parse(e);
                                                          if (((i = !1), null != t.error))
                                                              return (
                                                                  $(".modal-ui-block").fadeOut("fast"),
                                                                  0 === t.error && iziToast.error({ message: "A server error occurred.", icon: "fa fa-times", position: "bottomCenter" }),
                                                                  1 === t.error &&
                                                                      iziToast.error({ message: "Failed to find the specified Email service.<br>Check the provided data for errors.", position: "bottomCenter", icon: "fa fa-times" }),
                                                                  2 === t.error &&
                                                                      iziToast.error({
                                                                          message: "Email must be between 5 and 24 characters long and cannot contain special or Russian characters.",
                                                                          icon: "fa fa-times",
                                                                          position: "bottomCenter",
                                                                      }),
                                                                  4 === t.error && iziToast.error({ message: "A user with this email already exists.", icon: "fa fa-times", position: "bottomCenter" }),
                                                                  void (
                                                                      5 === t.error &&
                                                                      iziToast.error({ message: $("#nch").val() + " was detected as registered through a temporary email service.", position: "bottomCenter", icon: "fa fa-times" })
                                                                  )
                                                              );
                                                          window.location.reload();
                                                      }).fail(function () {
                                                          $(".modal-ui-block").fadeOut("fast"), iziToast.error({ message: "An error occurred. Please try again.", icon: "fa fa-times", position: "bottomCenter" }), (i = !1);
                                                      });
                                            });
                                    },
                                ],
                                [
                                    "<button><b>Cancel</b></button>",
                                    function (e, i) {
                                        $(".csp .iziToast-close").click();
                                    },
                                ],
                            ],
                        });
                }),
                (window.client_username_change_prompt = function () {
                    $(".pf .iziToast-close").click(),
                        iziToast.show({
                            backgroundColor: "#1c1e23",
                            progressBar: !1,
                            theme: "dark",
                            overlay: !0,
                            drag: !1,
                            displayMode: 1,
                            pauseOnHover: !1,
                            timeout: !1,
                            message: "Account name change!",
                            class: "csp",
                            position: "center",
                            buttons: [
                                [
                                    "<button><b>Continue</b></button>",
                                    function (e, t) {
                                        $(".csp .iziToast-close").click(),
                                            iziToast.question({
                                                rtl: !1,
                                                layout: 1,
                                                class: "mm pf",
                                                theme: "dark",
                                                backgroundColor: "#1c1e23",
                                                drag: !1,
                                                timeout: !1,
                                                close: !0,
                                                overlay: !0,
                                                displayMode: 1,
                                                progressBar: !1,
                                                icon: !1,
                                                title: !1,
                                                message:
                                                    '<div class="auth_dlg" style="height: 262px"><div class="auth_header mm_header"><i class="fad fa-shield-alt"></i> Имя</div><div class="auth_content"><div class="login"><div class="login_title" style="height: 57px"><span id="l_a" class="pf_title">Changing the account name.</span></div><div class="login_fields pf_fields"><div class="login_fields__user"><div class="icon"><img class="pf_hi" src="/img/hash-key.png"></div><input id="nch" placeholder="username" type="text"><div class="validation"><img src="/img/tick.png"></div></input></div><div class="validation"><img src="/img/tick.png"></div></div><div class="login_fields__submit pf_submit" style="top: 162px!important;"><input id="cc" type="submit" value="Change"></div></div></div></div></div>',
                                                position: "center",
                                            }),
                                            $("#cc").on("click", function () {
                                                $("#nch").val().length < 5
                                                    ? iziToast.error({ message: "The name must contain at least 4 characters.", position: "bottomCenter", icon: "fa fa-times" })
                                                    : $.get("/change_client_username/" + $("#nch").val(), function (e) {
                                                          var t = JSON.parse(e);
                                                          if (((i = !1), null != t.error))
                                                              return (
                                                                  $(".modal-ui-block").fadeOut("fast"),
                                                                  0 === t.error && iziToast.error({ message: "A server error occurred.", icon: "fa fa-times", position: "bottomCenter" }),
                                                                  1 === t.error &&
                                                                      iziToast.error({ message: "Failed to find the specified email service.<br>Check the provided data for errors.", position: "bottomCenter", icon: "fa fa-times" }),
                                                                  2 === t.error &&
                                                                      iziToast.error({ message: "The name must be between 5 and 24 characters long and cannot contain special characters.", icon: "fa fa-times", position: "bottomCenter" }),
                                                                  3 === t.error && iziToast.error({ message: "A user with this login already exists.", icon: "fa fa-times", position: "bottomCenter" }),
                                                                  4 === t.error && iziToast.error({ message: "A user with this name already exists.", icon: "fa fa-times", position: "bottomCenter" }),
                                                                  void (5 === t.error && iziToast.error({ message: "An error occurred. Please try again.", position: "bottomCenter", icon: "fa fa-times" }))
                                                              );
                                                          window.location.reload();
                                                      }).fail(function () {
                                                          $(".modal-ui-block").fadeOut("fast"), iziToast.error({ message: "An error occurred. Please try again.", icon: "fa fa-times", position: "bottomCenter" }), (i = !1);
                                                      });
                                            });
                                    },
                                ],
                                [
                                    "<button><b>Cancel</b></button>",
                                    function (e, i) {
                                        $(".csp .iziToast-close").click();
                                    },
                                ],
                            ],
                        });
                }),
                $(document).ready(function () {
                    var e = !1;
                    $("#p_s_n").on("click", function () {
                        var i = $(".auth-tab-active").attr("data-auth-action");
                        console.log(i);
                        var t = $("#oldpass").val(),
                            o = $("#pass1").val(),
                            a = $("#pass2").val();
                        if (("change_pass" === i && t.length < 1) || o.length < 1 || a.length < 1) iziToast.error({ message: "Fill in the data!", icon: "fa fa-times", position: "bottomCenter" });
                        else if ("set_pass" === i)
                            $.get("/set_client_pass/" + o + "/" + a, function (e) {
                                var i = JSON.parse(e);
                                if (null != i.error)
                                    return (
                                        $(".modal-ui-block").fadeOut("fast"),
                                        0 === i.error && iziToast.error({ message: "The new password must be at least 8 characters long.", icon: "fa fa-times", position: "bottomCenter" }),
                                        void (1 === i.error && iziToast.error({ message: "The new passwords must match.", icon: "fa fa-times", position: "bottomCenter" }))
                                    );
                                window.location.reload();
                            }).fail(function () {
                                $(".modal-ui-block").fadeOut("fast"), iziToast.error({ message: "An error occurred. Please try again.", icon: "fa fa-times", position: "bottomCenter" });
                            });
                        else {
                            if (e) return;
                            (e = !0),
                                $.get("/change_client_pass/" + t + "/" + o + "/" + a, function (i) {
                                    var t = JSON.parse(i);
                                    if (((e = !1), null != t.error))
                                        return (
                                            $(".modal-ui-block").fadeOut("fast"),
                                            0 === t.error && iziToast.error({ message: "A server error occurred.", icon: "fa fa-times", position: "bottomCenter" }),
                                            1 === t.error && iziToast.error({ message: "Fill in the data!", position: "bottomCenter", icon: "fa fa-times" }),
                                            2 === t.error && iziToast.error({ message: "The new password must be at least 8 characters long.", icon: "fa fa-times", position: "bottomCenter" }),
                                            3 === t.error && iziToast.error({ message: "The new passwords must match.", icon: "fa fa-times", position: "bottomCenter" }),
                                            4 === t.error && iziToast.error({ message: "The current password is incorrect.", icon: "fa fa-times", position: "bottomCenter" }),
                                            void (5 === t.error && iziToast.error({ message: "The new password must be different from the old one.", position: "bottomCenter", icon: "fa fa-times" }))
                                        );
                                    window.location.reload();
                                }).fail(function () {
                                    $(".modal-ui-block").fadeOut("fast"), iziToast.error({ message: "An error occurred. Please try again.", icon: "fa fa-times", position: "bottomCenter" }), (e = !1);
                                });
                        }
                    });
                }),
                (window.cancelWithdraw = function (e) {
                    $.get("/withdraw/cancel/" + e, function (e) {
                        -1 !== parseInt(e)
                            ? (updateBalanceN(),
                              iziToast.success({ icon: "fal fa-check", message: "You have successfully canceled the payment.", position: "bottomCenter" }),
                              load(currentPage, function () {
                                  setTab("out");
                              }))
                            : iziToast.error({ icon: "fal fa-times", message: "A server error occurred. Please contact support.", position: "bottomCenter" });
                    });
                }),
                (window.filter = function (e) {
                    "all" !== e ? ($('.achievement-block:not([data-medal="' + e + '"])').hide(), $('.achievement-block[data-medal="' + e + '"]').show()) : $(".achievement-block").show();
                }),
                (window.loadAchievements = function (e) {
                    $("#achievements_content").fadeOut("fast"),
                        $("#load").fadeIn("fast"),
                        $.get("/achievements/" + $.urlParam("id") + "/" + e, function (e) {
                            var i = JSON.parse(e);
                            console.log(i),
                                (test = i),
                                (i = i.sort(function (e, i) {
                                    return !1 === e.unlock ? 0 : -1;
                                })),
                                $("#achievements_content").html("");
                            for (var t = 0; t < i.length; t++) {
                                var o = i[t];
                                $("#achievements_content").append(
                                    "\n                <div onclick=\"$(this).find('.achievement-info').find('.achievement-more').slideToggle('fast')\" data-medal=\"" +
                                        o.badge +
                                        '" class="achievement-block ' +
                                        (!1 === o.unlock ? "" : "achievement-unlocked") +
                                        " " +
                                        (null === o.reward ? "" : "with-reward") +
                                        '">\n                    <div class="achievement-icon">\n                        <i class="fad fa-award ' +
                                        o.badge +
                                        '"></i>\n                        ' +
                                        (!1 === o.unlock ? "" : '<div class="achievement-date">' + o.unlock + "</div>") +
                                        '\n                    </div>\n                    <div class="achievement-info">\n                        <div class="achievement-title">' +
                                        o.name +
                                        '</div>\n                        <div class="achievement-desc">' +
                                        o.description +
                                        '</div>\n                        <div class="achievement-more">\n                            <span>' +
                                        o.progress.current +
                                        "/" +
                                        o.progress.max +
                                        '</span>\n                            <div class="ach-progress-bar">\n                                <div style="width: ' +
                                        o.progress.percent +
                                        '%"></div>\n                            </div>\n                        </div>\n                    </div>\n                    ' +
                                        (null === o.reward ? "" : '<div class="achievement-reward">\n                        Reward: ' + o.reward + "\n                    </div>") +
                                        "\n                </div>\n            "
                                );
                            }
                            $("#load").fadeOut("fast", function () {
                                $("#achievements_content").fadeIn("fast");
                            });
                        });
                }),
                $(window).scroll(function () {
                    $("#user_drops").length > 0 && $(window).scrollTop() > $("#user_drops").offset().top + $("#user_drops").outerHeight() / 2 && "history" === i && loadNextPage($.urlParam("id"));
                }),
                setTab("history", !0),
                $.get("/get_refs", function (e) {
                    var i = JSON.parse(e);
                    if (0 === i.length) $("#ref_content").html('<span style="color: lightgrey">You haven\'t invited anyone yet.</span>');
                    else {
                        $("#ref_content").html(
                            '\n                <table class="live_table">\n                    <thead>\n                         <tr class="live_table-header">\n                            <th style="width: 80px;">Имя</th>\n                            <th>Activity <i class="fas fa-question-circle fqc tooltip" title="An active referral is one whose total winnings from all games have reached 50 rubles."></i></th>\n                         </tr>\n                    </thead>\n                    <tbody id="ref_body">\n                    </tbody>\n                </table>'
                        );
                        for (var t = 0; t < i.length; t++) {
                            var o = i[t];
                            $("#ref_body").append(
                                '\n                    <tr class="live_table-game">\n                        <th>\n                            <div class="ll_game">\n                                <span onclick="load(\'/user?id=' +
                                    o.user +
                                    "')\">" +
                                    o.username +
                                    "</span>\n                            </div>\n                        </th>\n                        <th>\n                            " +
                                    (o.active ? "Yes" : "No") +
                                    "\n                        </th>\n                    </tr>\n                "
                            );
                        }
                    }
                }),
                window.scrollTo({ top: 0, behavior: "smooth" }),
                $(".ach-menu-element:not(.ach-submenu)").on("click", function () {
                    $(this).hasClass("ach-menu-active") ||
                        ($(".ach-menu-element").removeClass("ach-menu-active"), $(this).addClass("ach-menu-active"), $(".ach-submenu div").slideUp("fast"), $("#" + $(this).attr("data-submenu") + " div").slideDown("fast"));
                }),
                $("#avatar-form").submit(function (e) {
                    e.preventDefault(), e.stopPropagation(), e.stopImmediatePropagation();
                    var i = new FormData($(this)[0]);
                    return (
                        $.ajax({
                            type: "POST",
                            url: "/profile/upload_avatar",
                            data: i,
                            cache: !1,
                            contentType: !1,
                            processData: !1,
                            success: function (e) {
                                var i = JSON.parse(e);
                                if (null != i.error)
                                    return (
                                        -1 === i.error && iziToast.error({ message: "Authorization is required.", icon: "fa fa-times", position: "bottomCenter" }),
                                        1 === i.error && iziToast.error({ message: "Select an image.", icon: "fa fa-times", position: "bottomCenter" }),
                                        void (2 === i.error && iziToast.error({ message: "The maximum image size is 3 MB.<br>Allowed formats: jpeg, png", icon: "fa fa-times", position: "bottomCenter" }))
                                    );
                                window.location.reload();
                            },
                        }),
                        !1
                    );
                });
        });
    },
});
