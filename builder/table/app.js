/**
 * table builder js
 * @author cleverstone
 * @since 1.0
 */
!function (window, angular) {
    "use strict";

    var $thisApp = angular.module("thisApp", ["$YmApp"]);
    $thisApp.controller('thisCtrl', [
        "$scope",
        "$http",
        "$timeout",
        "$interval",
        "$rootScope",
        "$YmApp",
        "$toastr",
        "$jq",
        "$yii",
        "$YmSpinner",
        "$swal",
        "$laydate",
        function (
            $scope,
            $http,
            $timeout,
            $interval,
            $rootScope,
            $YmApp,
            $toastr,
            $jq,
            $yii,
            $YmSpinner,
            $swal,
            $laydate
        ) {
            // ----- 列表start
            // 获取请求链接
            var link = '<?= $link ?>';

            $scope.getUrl = function (page, perPage) {
                page = page || 1;
                perPage = perPage || 20;
                var param = {
                    page: page,
                    'per-page': perPage,
                };

                return link + '?' + $jq.param(param);
            };

            // 获取数据列表
            $scope.getList = function (page, perPage) {
                // 节流
                var i = $YmSpinner.show();
                $http.get($scope.getUrl(page, perPage)).then(function (result) {
                    $YmSpinner.hide(i);

                    var data = result.data;
                    $scope.ymPage = data.page;
                    $scope.list = data.data;

                    $scope.cancalCheckboxChecked();
                }, function (error) {
                    $YmSpinner.hide(i);
                    $toastr.error('系统错误', '数据加载失败，请稍后重试');
                    console.error(error);
                });
            };

            // 列表刷新时，取消多选框的选中状态
            $scope.cancalCheckboxChecked = function () {
                $YmApp.uncheckTableIcheck();
            };

            // 初始化方法
            ($scope.init = function () {
                $scope.getList();
            }());

            // 分页
            $scope.getPage = function (page, perPage) {
                $scope.getList(page, perPage);
            };

            // 跳转到指定页
            $scope.dumpSpecialPage = function (perPage) {
                var page = $scope.currentPage;
                $scope.getList(page, perPage);
            };

            // 设置数据条数
            $jq('body').on('change', '#pageSelect', function () {
                $scope.getList(1, $jq(this).val());
            });

            // 监听angular列表渲染完成
            $scope.$on('ev-repeat-finished', function () {
                // 初始化Icheck
                $YmApp.initTableIcheck();
            });

            // ----- 列表end

            // ------ 工具栏 start
            // 选中删除
            $scope.deleteSelected = function () {
                var data = $YmApp.getTableCheckedData();
            };

        }]);
}(window, window.angular);