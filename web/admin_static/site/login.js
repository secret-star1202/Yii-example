/**
 * @link http://www.cleverstone.cn/
 * @copyright Copyright (c) 2020 黑与白
 * @license http://yii-manager.cleverstone.cn/license/
 * @author cleverstone <yang_hui_lei@163.com>
 * @since 1.0
 */
!function (window, _EasyApp) {
    "use strict";

    // 登录 - 基本校验
    _EasyApp.controller('_loginBaseCtrl', ["$scope", "$http", "$timeout", "$interval", "$rootScope", "YmApp", "toastr", "jQuery", "yii", "YmSpinner", "Swal", "laydate", "layer", function ($scope, $http, $timeout, $interval, $rootScope, YmApp, toastr, jQuery, yii, YmSpinner, Swal, laydate, layer) {
        console.log("%c This is Login-Base-Page with Yii-Manager", 'color:#337ab7;');
        // 初始化脚本
        var initedScript = function () {
            // 登录错误信息
            $scope.loginErr = '';
        };
        // 当[邮箱/用户名]失焦时,检查用户名是否正确
        $scope.checkUser = function () {
            if ($scope.usernameOrEmail) {
                var index = layer.load(2, {time: 10 * 1000});
                $http.post(YmApp.$adminApi.checkUser, {
                    usernameOrEmail: $scope.usernameOrEmail,
                }).then(function (result) {
                    layer.close(index);
                    var data = result.data;
                    if (data.code !== 200) {
                        layer.tips(data.msg, "#usernameOrEmail", {time: 1500, tips: 1});
                    }
                }, function (error) {
                    layer.close(index);
                    console.error(error);
                    toastr.error(error.data || "系统错误", "通知");
                });
            }
        };
        // 登录提交
        $scope.loginSubmit = function () {
            // 点击登录按钮初始化页面错误信息
            if ($scope.loginErr) {
                $scope.loginErr = "";
            }

            // 检查邮箱/用户名是否填写
            if (!$scope.usernameOrEmail) {
                layer.tips('请输入邮箱/用户名', "#usernameOrEmail", {time: 1500, tips: 1});
                return;
            }

            // 检查登陆密码是否填写
            if (!$scope.password) {
                layer.tips('请输入登录密码', "#password", {time: 1500, tips: 1});
                return;
            }

            // 登录提交
            var authLoading = YmSpinner.show('登录认证中,请稍后');
            $http.post(YmApp.$adminApi.loginSubmit, {
                usernameOrEmail: $scope.usernameOrEmail,
                password: $scope.password,
            }).then(function (result) {
                YmSpinner.hide(authLoading);
                var data = result.data;
                if (data.code === 200) {
                    // 登录校验成功进行二次校验或直接进入首页
                    $timeout(function () {
                        window.location.href = data.data;
                    });
                } else {
                    // 登录校验错误,显示错误信息
                    $scope.loginErr = data.msg;
                }
            }, function (error) {
                YmSpinner.hide(authLoading);
                console.error(error);
                toastr.error(error.data || "系统错误", "通知");
            });
        };
        // 其他登录方式, asm: app扫码
        $scope.otherLgn = function (code, $event) {
            switch (code) {
                case 'asm': // app扫码
                    layer.tips('APP扫码暂不支持', $event.currentTarget, {time: 1500, tips: 3});
                    break;
            }
        };

        // 初始化脚本
        initedScript();
    }]).controller('_loginSafeCtrl', ["$scope", "$http", "$timeout", "$interval", "$rootScope", "YmApp", "toastr", "jQuery", "yii", "YmSpinner", "Swal", "laydate", "layer", function ($scope, $http, $timeout, $interval, $rootScope, YmApp, toastr, jQuery, yii, YmSpinner, Swal, laydate, layer) {
        // 登录 - 安全校验
        console.log("%c This is Login-Safe-Page with Yii-Manager", 'color:#337ab7;');
        // 初始化应用信息
        var initAppInfo = function () {
            $scope.appInfo = '';
            $scope.appSuccess = true;
        };
        // 初始化发送邮件节流器
        var initEmailStreamer = function () {
            $scope.emailFlag = false;
            $scope.emailBtnLabel = '获取邮件码';
        };
        // 初始化发送短信节流器
        var initMessageStreamer = function () {
            $scope.messageFlag = false;
            $scope.messageBtnLabel = '获取短信码';
        };
        // 初始化表单值
        var initFormValues = function () {
            $scope.safeCode = '';
        };
        // 初始化页面
        var initScript = function () {
            // 初始化应用信息
            initAppInfo();
            // 初始化节流器
            initEmailStreamer();
            initMessageStreamer();
            // 初始化表单值
            initFormValues();
        };
        // 发送邮件节流器
        var eamilStreamer = function () {
            $scope.emailFlag = true;
            var total = 60;
            $scope.emailBtnLabel = total + 's';
            var timer = $interval(function () {
                total--;
                if (total <= 0) {
                    $interval.cancel(timer);
                    initEmailStreamer();
                } else {
                    $scope.emailBtnLabel = total + 's';
                }
            }, 1000);
        };
        // 发送短信节流器
        var messageStreamer = function () {
            $scope.messageFlag = true;
            var total = 60;
            $scope.messageBtnLabel = total + 's';
            var timer = $interval(function () {
                total--;
                if (total <= 0) {
                    $interval.cancel(timer);
                    initMessageStreamer();
                } else {
                    $scope.messageBtnLabel = total + 's';
                }
            }, 1000);
        };
        // 获取邮件验证码
        $scope.getVerificationCode = function () {
            if ($scope.emailFlag === true) {
                return;
            }

            var index = layer.load(2, {time: 10 * 1000});
            $http.post(YmApp.$adminApi.sendCodeUrl, {
                scenario: 'email',
            }).then(function (result) {
                layer.close(index);
                var data = result.data;
                if (data.code === 200) {
                    $scope.appSuccess = true;
                    eamilStreamer();
                } else {
                    $scope.appSuccess = false;
                }

                $scope.appInfo = data.msg;
            }, function (error) {
                layer.close(index);
                console.error(error);
                toastr.error(error.data || "系统错误", "通知");
            });
        };
        // 获取短信验证码
        $scope.getMessageCode = function () {
            if ($scope.messageFlag === true) {
                return;
            }

            var index = layer.load(2, {time: 10 * 1000});
            $http.post(YmApp.$adminApi.sendCodeUrl, {
                scenario: 'message',
            }).then(function (result) {
                layer.close(index);
                var data = result.data;
                if (data.code === 200) {
                    $scope.appSuccess = true;
                    messageStreamer();
                } else {
                    $scope.appSuccess = false;
                }

                $scope.appInfo = data.msg;
            }, function (error) {
                layer.close(index);
                console.error(error);
                toastr.error(error.data || "系统错误", "通知");
            });
        };

        // 切换账号
        $scope.backLog = function () {
            window.location.href = YmApp.$adminApi.loginUrl;
        };
        // 继续登录
        $scope.continueLog = function (way) {
            // 重置应用信息
            initAppInfo();
            // 检查认证码是否已填写.
            if (!$scope.safeCode) {
                var ele = '';
                switch (way) {
                    case '2': // 邮箱认证
                        ele = '#email_code';
                        break;
                    case '3': // 短信认证
                        ele = '#message_code';
                        break;
                    case '4': // otp认证
                        ele = '#otp_code';
                        break;
                }

                layer.tips('请输入认证码', ele, {time: 1500, tips: 3});
                return;
            }

            // 提交认证码
            var spinnerIndex = YmSpinner.show('认证提交中,请稍后');
            $http.post(YmApp.$adminApi.safeSubmit, {
                safe_code: $scope.safeCode,
            }).then(function (result) {
                YmSpinner.hide(spinnerIndex);
                var data = result.data;
                if (data.code === 200) {
                    // 登录成功
                    window.location.href = YmApp.$adminApi.homeUrl;
                } else {
                    $scope.appSuccess = false;
                    $scope.appInfo = data.msg;
                }
            }, function (error) {
                YmSpinner.hide(spinnerIndex);
                console.error(error);
                toastr.error(error.data || "系统错误", "通知");
            });
        };

        initScript();
    }]);
}(window, window._EasyApp);
