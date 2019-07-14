jQuery.extend({
  // showError: function () {
  //     $('#loading').remove();
  //     $(".info-box").remove();
  //     $("body").append("<div class='info-box'><div class=error>网络繁忙，请稍后重试</div></div>");
  //     setTimeout(function () {
  //         $(".info-box").animate({"top": "50px", "opacity": 0}, function () {
  //             $(".info-box").remove();
  //         });
  //     }, 2000)
  // },
  extendGet: function (url, data, dataType, sucess, error) {
    return jQuery.ajax({
      url: url,
      timeout: 60000,
      type: "GET",
      dataType: dataType,
      data: data,
      success: sucess,
      error: error || function () {
        if ($("#loading").length > 0) {
          //jQuery.showError();
        }
      }
    });
  },
  extendGetJSONLayer: function (url, data, sucess, error) {
    return jQuery.ajax({
      url: url,
      timeout: 60000,
      type: "GET",
      dataType: "json",
      data: data,
      success: sucess,
      beforeSend: function () {
        var htmlStr = '<div class="testLayer" style="width:100%;height:100%;position: fixed;top: 0;left: 0;z-index:99999999999;"></div>';
        $('body').append(htmlStr);
      },
      error: error || function () {
      }
    }).always(function () {
      $('.testLayer').remove();
    });
  },
  extendGetJSON: function (url, data, sucess, error) {
    return jQuery.ajax({
      url: url,
      timeout: 60000,
      type: "GET",
      dataType: "json",
      data: data,
      success: sucess,
      error: error || function () {
        if ($("#loading").length > 0) {
          //jQuery.showError();
        }
      }
    });
  },
  extendSyncGetJSON: function (url, data, sucess, error) {
    return jQuery.ajax({
      url: url,
      timeout: 60000,
      type: "GET",
      dataType: "json",
      data: data,
      async: false,
      success: sucess,
      error: error || function () {
        if ($("#loading").length > 0) {
          //jQuery.showError();
        }
      }
    });
  },
  extendPostLayer: function (url, data, dataType, sucess, error) {
    return jQuery.ajax({
      url: url,
      timeout: 60000,
      type: "POST",
      contentType: "application/json; charset=utf-8",
      dataType: dataType,
      data: data,
      success: sucess,
      beforeSend: function () {
        var htmlStr = '<div class="testLayer" style="width:100%;height:100%;position: fixed;top: 0;left: 0;z-index:99999999999;"></div>';
        $('body').append(htmlStr);
      },
      error: error || function () {
      }
    }).always(function () {
      $('.testLayer').remove();
    });
  },
  extendPost: function (url, data, dataType, sucess, error) {
    return jQuery.ajax({
      url: url,
      timeout: 60000,
      type: "POST",
      dataType: dataType,
      data: data,
      success: sucess,
      error: error || function (textStatus, errorThrown) {
        if ($("#loading").length > 0) {
          //jQuery.showError();
        }
      }
    })
  }
});
