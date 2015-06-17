/**
 * Created by nurzamat on 3/21/15.
 */

/**
 * Substitue textarea field with phone numbers with a set of inputs like
 *
 *    area code     phone number
 * 8 [_________] — [____________]
 * 8 [_________] — [____________]
 * 8 [_________] — [____________]
 *
 *   [_ADD_MORE_]
 *
 * author: ilya
 * created: 29-11-2010
 */

jQuery.fn.phones = function(OS)
{
    var OS = jQuery.extend(
        {
            lines: 3,
            linesToAdd: 3,
            showAddButton: true,
            codesFour: [
                '727', // Almaty
                '777', '705', '771', '776', // beeline
                '701', '702', '775', '778', // aktiv kcell
                '700', '708', // dalacom
                '707', '747', // tele2
                '760', '761', // АО «Казахтелеком» (Спутниковая сеть Кулан)
                '762', // АО «Nursat»
                '763', // АО «Арна»
                '764', // АО «2 Day Telecom»
            ]
        },
        OS);

    jQuery.fn.phones.rows = function(howMuch)
    {
        var s = '';
        for(var i = 0; i < howMuch; ++ i)
            s += jQuery.fn.phones.row();
        return s;
    };

    jQuery.fn.phones.row = function(code, number)
    {
        if(!code)
            code = '';

        if(!number)
            number = '';

        return '<tr class="phones-phone"><td class="form-inner-text form-phones-td">+7</td><td class="form-phones-td">(<input type="text" id="a-phones-0-code" value="' + code + '" size="4" class="textInput" />)</td><td class="form-phones-td"><input type="text" id="a-phones-0-number" value="' + number + '" size="10" class="textInput" /></td></tr>';
    };

    jQuery.fn.phones.headerRow = function()
    {
        return '<tr><th></th><th colspan="2" class="form-phones-th">Код&nbsp;города<br/>или&nbsp;оператора</th></tr>';
    };

    jQuery.fn.phones.buttonRow = function()
    {
        return '<tr><td></td><td colspan="3">&nbsp;<a class="flink addPhones small" href="#">Еще телефонов!</a></td></tr>';
    };

    jQuery.fn.phones.parseToRows = function(text, howMuch)
    {
        var s = '';
        var sCnt = 0;

        var phones = text.split(',');
        for(var i = 0, ic = phones.length; i < ic; ++ i)
        {
            var phone = phones[i].replace(/[^\+\d\(\)]/g, '');
            var code = '';
            var number = '';

            var tokens = phone.match(/^(?:8|\+7)\((\d+)\)/);
            if(tokens && tokens.length > 1)
            {
                code = tokens[1];
                number = phone.substring(code.length + 2);
            }
            else
            {
                var tokens = phone.match(/^(?:8|\+7)?(\d{3})(\d+)/);
                if(tokens && tokens.length > 1 && tokens[2].length > 5)
                {
                    code = tokens[1];
                    number = tokens[2];
                }
                else
                    number = phone;
            }

            number = number.replace(/[^\d]/g, '');

            if(code.length > 0 || number.length > 0)
            {
                if(phone.length > 10)
                {
                    var homePhone = true;

                    $.each(OS.codesFour, function (k, v)
                        {
                            if(v == code)
                            {
                                homePhone = false;
                            }
                        }
                    );

                    if(homePhone)
                    {
                        code = code + number.substring(0, 1);

                        number = number.substring(1);
                    }
                }

                s += jQuery.fn.phones.row(code, number);
                ++ sCnt;
            }
        }

        for(var i = sCnt; i < howMuch; ++ i)
        {
            s += jQuery.fn.phones.row();
        }

        return s;
    };

    jQuery.fn.phones.rowToString = function(row)
    {
        var code = jQuery(row).find("input:eq(0)").val();
        var number = jQuery(row).find("input:eq(1)").val();

        if(code && number)
            return "+7" + code + number;
        else if(code)
            return "+7" + code;
        else if(number)
            return number;

        return "";
    };

    return this.each(function()
    {
        var instance = this;

        var keyUp = function()
        {
            var ar = [];
            jQuery(instance).parent().find("tr.phones-phone").each(function() {var number = jQuery.fn.phones.rowToString(this);if(number) ar.push(number)});
            jQuery(instance).val(ar.join(", "));
        }

        var changeP = function()
        {
            var ar = [];
            jQuery(instance).parent().find("tr.phones-phone").each(function() {var number = jQuery.fn.phones.rowToString(this);if(number) ar.push(number)});
            jQuery(instance).val(ar.join(", "));
        }

        jQuery(this).hide().parent()
            .append('<table cellspacing="0" cellpadding="0" border="0" class="form-phones">' + /*jQuery.fn.phones.headerRow() +*/ jQuery.fn.phones.parseToRows(jQuery(this).val(), OS.lines) + (OS.showAddButton ? jQuery.fn.phones.buttonRow() : "") + '</table>')
            .find("a.addPhones").click(function(event)
            {
                jQuery(this).parent().parent().before(jQuery.fn.phones.rows(OS.linesToAdd));
                jQuery(instance).parent().find("tr.phones-phone").slice(-1 * OS.linesToAdd).find("input[type=text]").keyup(keyUp);

                event.preventDefault();
            });

        jQuery(this).parent().find("input[type=text]").keyup(keyUp);
        jQuery(this).parent().find("input[type=text]").change(changeP);
    });
};


