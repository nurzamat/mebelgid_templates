/**
 * Created by nurzamat on 3/21/15.
 */

(function($) {
    $.fn.serializeJSON = function()
    {
        var json = {};

        jQuery.map($(this).serializeArray(), function(n, i)
        {
            json[n['name']] = n['value'];
        });

        return json;
    };
})( jQuery );

(function($) {
    $.fn.extend({
        files: function(settings) {

            // default settings
            var settings = $.extend({}, settings);

            // upload complete callback
            var uploadedFilesNum = 0;

            var loadComplete = function($targetDiv, e, data) {

                if(data.result.uploadedFileNum)
                {
                    $("#file-uploading-" + data.result.uploadedFileNum).remove();
                }

                if(data.result.msg.files.err.length > 0)
                {
                    alert(data.result.msg.files.err.join("\\n"));
                    return;
                }

                var $file = $(data.result.fileHtml).hide();

                $targetDiv.find("#files").append($file);

                $file
//                    .draggable({opacity: 0.7, helper: 'clone'})
                    .slideDown(500)
                ;

                if($("#id").val() == '' || $("#id").val() == undefined)
                    $("#id").val(data.result.adId);

                $targetDiv.find('.files-list-empty').slideUp(500);
            }

            // main target loop
            this.each(function() {

                var $targetDiv = $(this);

                $("#formAd")

                    .fileupload({

                    })

                    .bind("fileuploadsubmit", function(e, data) {

                        var uploadedFileNum = ++ uploadedFilesNum;

                        $targetDiv.find("#files").append('<div class="file-uploading" id="file-uploading-' + uploadedFileNum + '"></div>');

                        data.formData = data.form.serializeArray();
                        data.formData.push({name: "uploadedFileNum", value: uploadedFileNum});
                    })

                    .bind("fileuploaddone", function(e, data) {
                        loadComplete($targetDiv, e, data);
                    })

                    .bind("fileuploadfail", function(e, data) {
                        alert(data);
                    })
                ;

                var $removeForm = $("#formAd");

                $removeForm.on("click", ".form-del-photo", function() {

                    if(confirm('Вы действительно хотите удалить файл?')) {

                        var $removeButton = $(this);
                        $removeButton.attr("disabled", true);

                        var $data = $removeForm.serializeJSON();
                        $data['removeFile'] = $removeButton.attr('name');

                        $.post($removeForm.attr('action'), $data, function(data)
                        {
                            if(data.msg.files.length > 0)
                            {
                                alert(data.msg.files.err.join("\n"));
                                $removeButton.attr("disabled", false);
                            }
                            else if(data.forId)
                            {
                                $removeButton.closest('div').fadeOut(500);
                            }
                        });
                    }

                    return false;

                });

            });

        }
    });
})(jQuery);