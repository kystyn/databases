/**
 * Created by Константин on 11.11.2018.
 */

function showArrivedTrains( divId, checkboxId ) {
    var arrTr = document.getElementById(divId);
    var showTr = document.getElementById(checkboxId);
    arrTr.style.display = showTr.checked ? 'table' : 'none';
}

function showCargoTurnoverReport( stationCode ) {
    var reportDiv = document.getElementById('reportCargoTurnover');
    var d1 = document.getElementById('date1').value;
    var d2 = document.getElementById('date2').value;
    var fname = 'reports/reportCargoTurnover_' + stationCode + '_' + d1 + '_' + d2 + '.html';
    var a = document.createElement('a');
    reportDiv.appendChild(a);
    a.href = "report.php?fileName=" + fname + "&stationCode=" + stationCode  + "&dateFrom=" + d1 + "&dateTo=" + d2 + "&cargo=1";
    a.click();
}

function showTrainTurnoverReport( stationCode ) {
    var reportDiv = document.getElementById('reportTrainsTurnover');
    var d1 = document.getElementById('date3').value;
    var d2 = document.getElementById('date4').value;
    var fname = 'reports/reportTrainTurnover_' + stationCode + '_' + d1 + '_' + d2 + '.html';
    var a = document.createElement('a');
    reportDiv.appendChild(a);
    a.href = "report.php?fileName=" + fname + "&stationCode=" + stationCode  + "&dateFrom=" + d1 + "&dateTo=" + d2 + "&train=1";
    a.click();
}
