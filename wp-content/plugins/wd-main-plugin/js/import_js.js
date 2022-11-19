jQuery(document).ready(function ($) {
  "use strict";
  $(document).on('change', '#Demo_selector', function () {
    $(".demos_label").hide();
    $(".demos_label." + $(this).val()).show();
  });
  $(document).on('change', '#import_option', function () {
    if ($(this).val() == 'content') {
      $("#tr_import_attachments").show();
      $("#tr_delete_menus").hide();
    } else if ($(this).val() == 'widgets') {
      $("#tr_import_attachments").hide();
      $("#tr_delete_menus").hide();
    } else if ($(this).val() == 'menus') {
      $("#tr_import_attachments").hide();
      $("#tr_delete_menus").show();
    } else if ($(this).val() == 'complete_content') {
      $("#tr_import_attachments").show();
      $("#tr_delete_menus").show();
    } else {
      $("#tr_import_attachments").hide();
      $("#tr_delete_menus").hide();
    }
  });
  $(document).on('click', '#import_demo_data', function (e) {
    e.preventDefault();

    if ($("#import_option").val() == "") {
      alert('Please select Import Type.');
      return false;
    }
    if (confirm('Are you sure, you want to import Demo Data now?')) {
      $('.import_load').css('display', 'block');
      var progressbar = $('#progressbar');
      var import_opt = $("#import_option").val();
      var import_expl = $("#Demo_selector").val();
      var p = 0;

      $('.progress-value').html((0) + '%');
      progressbar.val(0);
      $('.progress-bar-message').html('');
      $('.error-message').html('');
      $('#loading_gif').css({display: "inline"});
      $('#OK_result').css({display: "none"});
      $('#NOK_result').css({display: "none"});
      if (import_opt == 'content') {
        for (var i = 1; i <= 10; i++) {
          var str;
          if (i < 10) str = 'demo-file-0' + i + '.xml';
          else str = 'demo-file-' + i + '.xml';
          $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
              action: 'ajzaa_dataImport',
              xml: str,
              example: import_expl,
              import_attachments: ($("#import_attachments").is(':checked') ? 1 : 0)
            },
            success: function (data, textStatus, XMLHttpRequest) {
              console.log('Success!!' + data);
              p += 10;
              $('.progress-value').html((p) + '%');
              progressbar.val(p);
              if (p == 90) {
                str = 'demo-file-10.xml';
                $.ajax({
                  type: 'POST',
                  url: ajaxurl,
                  data: {
                    action: 'ajzaa_dataImport',
                    xml: str,
                    example: import_expl,
                    import_attachments: ($("#import_attachments").is(':checked') ? 1 : 0)
                  },
                  success: function (data, textStatus, XMLHttpRequest) {
                    p += 10;
                    $('.progress-value').html((p) + '%');
                    progressbar.val(p);
                    $('.progress-bar-message').html('<div class="alert alert-success"><strong>Import is completed</strong></div>');
                    $('#loading_gif').css({display: "none"});
                    $('#OK_result').css({display: "inline"});
                  },
                  error: function (MLHttpRequest, textStatus, errorThrown) {
                    $('.error-message').html(get_error_from_response(MLHttpRequest));
                    $('#loading_gif').css({display: "none"});
                    $('#NOK_result').css({display: "inline"});
                  }
                });
              }
            },
            error: function (MLHttpRequest, textStatus, errorThrown) {
              $('.error-message').html(get_error_from_response(MLHttpRequest));
              $('#loading_gif').css({display: "none"});
              $('#NOK_result').css({display: "inline"});
              console.log('Error!!');
            }
          });
        }
      } else if (import_opt == 'widgets') {
        $.ajax({
          type: 'POST',
          url: ajaxurl,
          data: {
            action: 'ajzaa_widgetsImport',
            example: import_expl
          },
          success: function (data, textStatus, XMLHttpRequest) {
            console.log('widgets imported');
            $('.progress-value').html((100) + '%');
            progressbar.val(100);
            $('.progress-bar-message').html('<div class="alert alert-success"><strong>Widgets import is completed</strong></div>');
            $('#loading_gif').css({display: "none"});
            $('#OK_result').css({display: "inline"});
          },
          error: function (MLHttpRequest, textStatus, errorThrown) {
            $('.error-message').html(get_error_from_response(MLHttpRequest));
            $('#loading_gif').css({display: "none"});
            $('#NOK_result').css({display: "inline"});
          }
        });
      } else if (import_opt == 'menus') {
        $.ajax({
          type: 'POST',
          url: ajaxurl,
          data: {
            action: 'ajzaa_menuImport',
            example: import_expl,
            delete_menus: ($("#delete_menus").is(':checked') ? 1 : 0)
          },
          success: function (data, textStatus, XMLHttpRequest) {
            console.log('Menus imported' + data);
            $('.progress-value').html((100) + '%');
            progressbar.val(100);
            $('.progress-bar-message').html('<div class="alert alert-success"><strong>Menus import is completed</strong></div>');
            $('#loading_gif').css({display: "none"});
            $('#OK_result').css({display: "inline"});
          },
          error: function (MLHttpRequest, textStatus, errorThrown) {
            $('.error-message').html(get_error_from_response(MLHttpRequest));
            $('#loading_gif').css({display: "none"});
            $('#NOK_result').css({display: "inline"});
          }
        });
      } else if (import_opt == 'options') {
        $.ajax({
          type: 'POST',
          url: ajaxurl,
          data: {
            action: 'ajzaa_import_options',
            example: import_expl
          },
          success: function (data, textStatus, XMLHttpRequest) {
            console.log('options imported');
            $('.progress-value').html((100) + '%');
            progressbar.val(100);
            $('.progress-bar-message').html('<div class="alert alert-success"><strong>Options import is completed</strong></div>');
            $('#loading_gif').css({display: "none"});
            $('#OK_result').css({display: "inline"});
          },
          error: function (MLHttpRequest, textStatus, errorThrown) {
            $('.error-message').html(get_error_from_response(MLHttpRequest));
            $('#loading_gif').css({display: "none"});
            $('#NOK_result').css({display: "inline"});
          }
        });
      } else if (import_opt == 'complete_content') {
        for (var i = 1; i < 10; i++) {
          var str;
          if (i < 10) str = 'demo-file-0' + i + '.xml';
          else str = 'demo-file-' + i + '.xml';
          $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
              action: 'ajzaa_dataImport',
              xml: str,
              example: import_expl,
              import_attachments: ($("#import_attachments").is(':checked') ? 1 : 0)
            },
            success: function (data, textStatus, XMLHttpRequest) {
              p += 7;
              $('.progress-value').html((p) + '%');
              progressbar.val(p);
              if (p == 63) {
                str = 'demo-file-10.xml';
                $.ajax({
                  type: 'POST',
                  url: ajaxurl,
                  data: {
                    action: 'ajzaa_dataImport',
                    xml: str,
                    example: import_expl,
                    import_attachments: ($("#import_attachments").is(':checked') ? 1 : 0)
                  },
                  success: function (data, textStatus, XMLHttpRequest) {
                    p += 7;
                    $('.progress-value').html((p) + '%');
                    progressbar.val(p);
                    $('.progress-bar-message').append('<div class="alert alert-success">Content imported</div>');
                    $.ajax({
                      type: 'POST',
                      url: ajaxurl,
                      data: {
                        action: 'ajzaa_import_options',
                        example: import_expl
                      },
                      success: function (data, textStatus, XMLHttpRequest) {
                        p += 7;
                        $('.progress-value').html((p) + '%');
                        progressbar.val(p);
                        $('.progress-bar-message').append('<div class="alert alert-success">Options imported</div>');
                        console.log('options imported');
                        $.ajax({
                          type: 'POST',
                          url: ajaxurl,
                          data: {
                            action: 'ajzaa_widgetsImport',
                            example: import_expl
                          },
                          success: function (data, textStatus, XMLHttpRequest) {
                            p += 7;
                            $('.progress-value').html((p) + '%');
                            progressbar.val(p);
                            $('.progress-bar-message').append('<div class="alert alert-success">Widgets imported</div>');

                            str = 'menus.xml';
                            $.ajax({
                              type: 'POST',
                              url: ajaxurl,
                              data: {
                                action: 'ajzaa_menuImport',
                                xml: str,
                                example: import_expl,
                                import_attachments: ($("#import_attachments").is(':checked') ? 1 : 0),
                                delete_menus: ($("#delete_menus").is(':checked') ? 1 : 0)
                              },
                              success: function (data, textStatus, XMLHttpRequest) {
                                p += 7;
                                $('.progress-value').html((p) + '%');
                                progressbar.val(p);
                                $('.progress-bar-message').append('<div class="alert alert-success">Menus imported</div>');
                                console.log("menu imported");
                                $.ajax({
                                  type: 'POST',
                                  url: ajaxurl,
                                  data: {
                                    action: 'ajzaa_otherImport',
                                    example: import_expl,
                                    delete_menus: ($("#delete_menus").is(':checked') ? 1 : 0)
                                  },
                                  success: function (data, textStatus, XMLHttpRequest) {
                                    $('.progress-value').html((100) + '%');
                                    progressbar.val(100);
                                    $('.progress-bar-message').append('<div class="alert alert-success"><strong>Import is completed.</strong></div>');
                                    $('#loading_gif').css({display: "none"});
                                    $('#OK_result').css({display: "inline"});
                                  },
                                  error: function (MLHttpRequest, textStatus, errorThrown) {
                                    $('.error-message').html(get_error_from_response(MLHttpRequest));
                                    $('#loading_gif').css({display: "none"});
                                    $('#NOK_result').css({display: "inline"});
                                  }
                                });
                              },
                              error: function (MLHttpRequest, textStatus, errorThrown) {
                                $('.error-message').html(get_error_from_response(MLHttpRequest));
                                $('#loading_gif').css({display: "none"});
                                $('#NOK_result').css({display: "inline"});
                              }
                            });

                          },
                          error: function (MLHttpRequest, textStatus, errorThrown) {
                            $('.error-message').html(get_error_from_response(MLHttpRequest));
                            $('#loading_gif').css({display: "none"});
                            $('#NOK_result').css({display: "inline"});
                          }
                        });
                      },
                      error: function (MLHttpRequest, textStatus, errorThrown) {
                        $('.error-message').html(get_error_from_response(MLHttpRequest));
                        $('#loading_gif').css({display: "none"});
                        $('#NOK_result').css({display: "inline"});
                      }
                    });
                  },
                  error: function (MLHttpRequest, textStatus, errorThrown) {
                    $('.error-message').html(get_error_from_response(MLHttpRequest));
                    $('#loading_gif').css({display: "none"});
                    $('#NOK_result').css({display: "inline"});
                  }
                });
              }
            },
            error: function (MLHttpRequest, textStatus, errorThrown) {
              $('.error-message').html(get_error_from_response(MLHttpRequest));
              $('#loading_gif').css({display: "none"});
              $('#NOK_result').css({display: "inline"});
            }
          });
        }


      }
    }
    return false;
  });
});

function get_error_from_response(response) {
  var responseText = response.responseText.replace('{', '');
  responseText = responseText.replace('}', '');
  var trainindIdArray = responseText.split(':');
  responseText = trainindIdArray[trainindIdArray.length - 1].replace('"', '').replace('"', '');
  return responseText;
}