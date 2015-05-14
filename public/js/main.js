/**
 * Created by webs on 11.05.15.
 */
;(function ($) {
    'use strict';

    $('.js-date').mask('99.99.9999');

    (function () {
        var new_field = $('.b-data__hidden').html();
        var el_block_files = $('.b-data__fields');
        var el_form = $('.b-data');
        var url = el_form.attr('action');
        var el_result_sum_all = $('.js-result__data-sum_all');
        var el_result_d = $('.js-result__data-d');
        var el_result = $('.b-result');

        var count = 1;
        $(document).on('click', '.js-field__add', function (e) {
            e.preventDefault();
            var field = $(new_field).attr('name', 'N[' + count + ']');
            el_block_files.append(field);
            count++;
        });

        $(document).on('submit', '.b-data', function (e) {
            e.preventDefault();

            $.post(url, $(this).serialize(), function (resp) {
                el_result_sum_all.empty().html(JSON.stringify(resp.sum));
                el_result_d.empty().html(JSON.stringify(resp.d));
                el_result.show();
            }, 'json');
        });

    })();
})($)
