var TWB = {};

TWB.debug = function() {
  alert('hi');
}

TWB.dom = {
  articles:        '#articles',
  default_drop:    '.default',
  change_date:     '.change-date',
  change_type:     '.change-type',
  popular_tab:     '.popular_tab',
  upcoming_tab:    '.upcoming_tab',
  spinner_div:     '<div class="spinner"><img src=/images/ajax-loader.gif /></div>',
  url_tab:         ".url_tab",
  design_tab:      ".design_tab",
  question_tab:    ".question_tab",
  more_link:       ".more"
};

TWB.back_to_top = function() {
  // hide #back-top first
  $("#back-top").hide();
  // fade in #back-top
  $(function () {
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        $('#back-top').fadeIn();
      } else {
        $('#back-top').fadeOut();
      }
    });

    // scroll body to 0px on click
    $('#back-top a').click(function () {
      $('body,html').animate({
        scrollTop: 0
      }, 800);
      return false;
    });
  });
}

TWB.dropkick_defaults = function() {
  $(TWB.dom.default_drop).dropkick();
};

TWB.more_link_spinner = function() {
  $(TWB.dom.more_link).bind('click', function() {
    $(TWB.dom.more_link).html(TWB.dom.spinner_div);
  });
}

TWB.upcoming_date_filter = function(user_id) {
  $(TWB.dom.change_date).dropkick({
    change: function (value, label) {
      var d, o;
      if (value == "newest") {
        d = 'newest';
        o = 'newest';
      } else if (value == "oldest") {
        d = 'oldest';
        o = 'oldest';
      } else if (value == "most_popular") {
        d = 'most_popular';
        o = 'most_popular';
      } else if (value == "least_popular") {
        d = 'least_popular';
        o = 'least_popular';
      } else {
        d = 'newest';
        o = 'newest';
      }

      $(TWB.dom.articles).html(TWB.dom.spinner_div);

      if (user_id === undefined) {
        $.get('/filter?page=1&date=' + d + '&order=' + o, function(data) { });
      } else {
        $.get('/filter?page=1&date=' + d + '&order=' + o + '&content_user=' + user_id, function(data) { });
      }
    }
  });
};

TWB.popular_date_filter = function(user_id) {
  $(TWB.dom.change_date).dropkick({
    change: function (value, label) {
      var d, o;
      if (value == "today") {
        d = 'today';
	o = 'today';
      } else if (value == "recent") {
        d = 'recent';
        o = 'recent';
      } else if (value == "week") {
        d = 'week';
        o = 'week';
      } else if (value == "month") {
        d = 'month';
        o = 'month';
      } else if (value == "year") {
        d = 'year';
        o = 'year';
      } else if (value == "all") {
        d = 'all';
        o = 'all';
      } else {
        d = 'all';
        o = 'all';
      }

      $(TWB.dom.articles).html(TWB.dom.spinner_div);

      if (user_id === undefined) {
        $.get('/filter?page=1&date=' + d + '&order=' + o, function(data) { });
      } else {
        $.get('/filter?page=1&date=' + d + '&order=' + o + '&content_user='+user_id, function(data) { });
      }
    }
  });
};

TWB.type_filter = function(user_id) {
  $(TWB.dom.change_type).dropkick({
    change: function (value, label) {
      var t;
      if (value == "links") {
        t = 'links';
      } else if (value == "all") {
        t = 'all';
      } else if (value == "questions") {
        t = 'questions';
      } else if (value == "images") {
        t = 'images';
      } else {
        t = 'all';
      } 
      $(TWB.dom.articles).html(TWB.dom.spinner_div);
      if (user_id === undefined) {
        $.get('/filter?page=1&type=' + t, function(data) { });
      } else {
        $.get('/filter?page=1&type=' + t + '&content_user='+user_id, function(data) { });
      }
    }
  });
};

TWB.tab_filter = function(user_id) {
  $(TWB.dom.popular_tab).bind('click', function() {
    $(TWB.dom.articles).html(TWB.dom.spinner_div);
    if (user_id === undefined) {
      $.get('/filter?page=1&order=popular&date=recent', function(data) { });
    } else {
      $.get('/filter?page=1&order=popular&date=recent&content_user='+user_id, function(data) { });
    }

    $('#date_select').replaceWith(TWB.popular_date_select);
    $select = $("#date_select");
    $select.removeData("dropkick");
    $("#dk_container_date_select").remove();
    TWB.popular_date_filter(user_id);
  });

  $(TWB.dom.upcoming_tab).bind('click', function() {
    $(TWB.dom.articles).html(TWB.dom.spinner_div);
    if (user_id === undefined) {
      $.get('/filter?page=1&date=newest&order=newest', function(data) { });
    } else {
      $.get('/filter?page=1&date=newest&order=newest&content_user='+user_id, function(data) { });
    }

    $('#date_select').replaceWith(TWB.upcoming_date_select);
    $select = $("#date_select");
    $select.removeData("dropkick");
    $("#dk_container_date_select").remove();
    TWB.upcoming_date_filter(user_id);
  });
};

TWB.popular_date_container = '<div class="dk_container dk_theme_default" id="dk_container_date_select" tabindex="1" style="display: block; "><a class="dk_toggle" style="width: 210px; "><span class="dk_label">Recent</span></a><div class="dk_options"><ul class="dk_options_inner"><li class="dk_option_current"><a data-dk-dropdown-value="recent">Recent</a></li><li class=""><a data-dk-dropdown-value="today">Today</a></li><li class=""><a data-dk-dropdown-value="week">Week</a></li><li class=""><a data-dk-dropdown-value="month">Month</a></li><li class=""><a data-dk-dropdown-value="year">Year</a></li><li class=""><a data-dk-dropdown-value="all">All Time</a></li></ul></div></div>';
TWB.popular_date_select = '<select class="change-date" id="date_select" name="date[]" tabindex="1" style="display: none; "><option value="recent">Recent</option><option value="today">Today</option><option value="week">Week</option><option value="month">Month</option><option value="year">Year</option><option value="all">All Time</option></select>';
TWB.upcoming_date_container = '<div class="dk_container dk_theme_default" id="dk_container_date_select" tabindex="1" style="display: block; "><a class="dk_toggle" style="width: 210px; "><span class="dk_label">Newest</span></a><div class="dk_options"><ul class="dk_options_inner"><li class="dk_option_current"><a data-dk-dropdown-value="newest">Newest</a></li><li class=""><a data-dk-dropdown-value="oldest">Oldest</a></li><li class=""><a data-dk-dropdown-value="most_popular">Most Popular</a></li><li class=""><a data-dk-dropdown-value="least_popular">Least Popular</a></li></ul></div></div>';
TWB.upcoming_date_select = '<select class="change-date" id="date_select" name="date[]" tabindex="1" style="display: none; "><option value="newest">Newest</option><option value="oldest">Oldest</option><option value="most_popular">Most Popular</option><option value="least_popular">Least Popular</option></select>';

TWB.register_cancel_clicks = function() {
  $('.cancel_button').click(function() {
    if (document.referrer != "") {
      location.href = document.referrer;
    } else {
      window.history.back();
    }
    return(false);
  });
};

TWB.show_link_tab = function() {
  $("li#url_tab_li").attr("class", "active");
  $("li#design_tab_li").attr("class", "");
  $("li#question_tab_li").attr("class", "");

  $("#content_type").attr("name", "content[is_link]").attr("value", "true");
  $("h3#content_form_h3").html("Share a Link:");
  $("#url_form_div").show();
  $("#url_help_block").html("");
  $("#image_help_block").html("Not Required");
};

TWB.show_image_tab = function() {
  $("li#url_tab_li").attr("class", "");
  $("li#design_tab_li").attr("class", "active");
  $("li#question_tab_li").attr("class", "");

  $("#content_type").attr("name", "content[is_image]").attr("value", "true");
  $("h3#content_form_h3").html("Share a Design:");
  $("#url_form_div").show();
  $("#url_help_block").html("Not Required");
  $("#image_help_block").html("");
};

TWB.show_question_tab = function() {
  $("li#url_tab_li").attr("class", "");
  $("li#design_tab_li").attr("class", "");
  $("li#question_tab_li").attr("class", "active");

  $("#content_type").attr("name", "content[is_question]").attr("value", "true");
  $("h3#content_form_h3").html("Ask a Question:");
  $("input#content_link").attr('value', "");
  $("#url_form_div").hide();
  $("#url_help_block").html("");
  $("#image_help_block").html("Not Required");
};

TWB.register_url_tab_click = function() {
  $(TWB.dom.url_tab).click(function(){
    $("#content_type").attr("name", "content[is_link]").attr("value", "true");
    $("h3#content_form_h3").html("Share a Link:");
    $("#url_form_div").show();
    $("#url_help_block").html("");
    $("#image_help_block").html("Not Required");
  });
};

TWB.register_design_tab_click = function() {
  $(TWB.dom.design_tab).click(function(){
    $("#content_type").attr("name", "content[is_image]").attr("value", "true");
    $("h3#content_form_h3").html("Share a Design:");
    $("#url_form_div").show();
    $("#url_help_block").html("Not Required");
    $("#image_help_block").html("");
  });
};

TWB.register_question_tab_click = function() {
  $(TWB.dom.question_tab).click(function(){
    $("#content_type").attr("name", "content[is_question]").attr("value", "true");
    $("h3#content_form_h3").html("Ask a Question:");
    $("input#content_link").attr('value', "");
    $("#url_form_div").hide();
    $("#url_help_block").html("");
    $("#image_help_block").html("Not Required");
  });
};
