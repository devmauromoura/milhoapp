window.onload = function() {

    var chart1 = new CanvasJS.Chart("topPratos", {
      theme: "light2", // "light1", "light2", "dark1", "dark2"
      exportEnabled: true,
      animationEnabled: true,
      data: [{
        type: "pie",
        startAngle: 25,
        toolTipContent: "<b>{label}</b>: {y}%",
        showInLegend: "true",
        legendText: "{label}",
        indexLabelFontSize: 16,
        indexLabel: "{label} - {y}%",
        dataPoints: [
          { y: 51.08, label: "Cerveja" },
          { y: 27.34, label: "Cachaça" },
          { y: 10.62, label: "Refrigerante" },
          { y: 5.02, label: "Agua" },
          { y: 4.07, label: "Outros" },
        ]
      }]
    });

    var chart2 = new CanvasJS.Chart("topBebidas", {
      theme: "light2", // "light1", "light2", "dark1", "dark2"
      exportEnabled: true,
      animationEnabled: true,
      data: [{
        type: "pie",
        startAngle: 25,
        toolTipContent: "<b>{label}</b>: {y}%",
        showInLegend: "true",
        legendText: "{label}",
        indexLabelFontSize: 16,
        indexLabel: "{label} - {y}%",
        dataPoints: [
          { y: 51.08, label: "Milho assado" },
          { y: 27.34, label: "Milho Creme" },
          { y: 10.62, label: "Pamonha" },
          { y: 5.02, label: "Espeto" },
          { y: 4.07, label: "Cural" },
        ]
      }]
    });

    var chart3 = new CanvasJS.Chart("chartContainer", {
      animationEnabled: true,
      theme: "light2", // "light1", "light2", "dark1", "dark2"
      axisY: {
        title: "Numero de Votos",
        suffix: " Nº",
        includeZero: false
      },
      data: [{
        type: "column",
        yValueFormatString: "#,##0.0#\"%\"",
        dataPoints: [
          { label: "ADS", y: 98},	
          { label: "ADM", y: 77 },	
          { label: "Direito", y: 55 },
          { label: "Arquitetura", y: 38 },	
          { label: "Odontologia", y: 22 },
        ]
      }]
    });
    
    
    
    
    chart1.render();
    chart2.render();
    chart3.render();
    }