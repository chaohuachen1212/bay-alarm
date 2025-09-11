(function($) {

  var $cellularGraph = $('.cellular-graph');

  if ($cellularGraph.length) {
    var chunk1Price = parseFloat($('.chunk-1 p.chunk-price').text().replace('$', '')),
        chunk2Price = parseFloat($('.chunk-2 p.chunk-price').text().replace('$', '')),
        chunk3Price = parseFloat($('.chunk-3 p.chunk-price').text().replace('$', '')),
        chunk4Price = parseFloat($('.chunk-4 p.chunk-price').text().replace('$', '')),
        modifier = 4; // height modifier for total bar height. $1 = 4px

    var bar1Total = chunk1Price + chunk2Price;
    var bar1Height = bar1Total * modifier;
    var bar1TotalChunks = bar1Total.toFixed(2).split('.');

    var bar2Total = chunk3Price + chunk4Price;
    var bar2Height = bar2Total * modifier;
    var bar2TotalChunks = bar2Total.toFixed(2).split('.');

    var chunk1Height = (chunk1Price / bar1Total) * 100;
    var chunk2Height = 100 - chunk1Height;

    var chunk3Height = (chunk3Price / bar2Total) * 100;
    var chunk4Height = 100 - chunk3Height;

    $('.bar-left').css('height', bar1Height + 'px');
    $('.bar-right').css('height', bar2Height + 'px');
    $('.chunk-1').css('height', chunk1Height + '%');
    $('.chunk-2').css('height', chunk2Height + '%');
    $('.chunk-3').css('height', chunk3Height + '%');
    $('.chunk-4').css('height', chunk4Height + '%');

    $('.bar-left-total').html('$' + bar1TotalChunks[0] + '<span>.' + bar1TotalChunks[1] + '</span>');
    $('.bar-right-total').html('$' + bar2TotalChunks[0] + '<span>.' + bar2TotalChunks[1] + '</span>');
  }

}(jQuery));