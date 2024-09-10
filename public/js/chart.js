window.Apex = {
  chart: {
    foreColor: '#000',
    toolbar: {
      show: false
    },
  },
  stroke: {
    width: 3
  },
  dataLabels: {
    enabled: false
  },
  tooltip: {
    theme: 'dark'
  },
  grid: {
    borderColor: "rgba(255, 255, 255, 0.2)"
    
  }
};



var optionsBar = {
  chart: {
    height: '100%',
    type: 'bar',
    
  },
  yaxis: {
    labels: {
      style: {
        fontSize: '12px', 
        fontFamily: 'Urbanist',
        fontWeight: 400
      },
    },
    min: 0, 
    max: 1000, 
    tickAmount: 5,
  },
  plotOptions: {
    bar: {
      columnWidth: '50%',
      horizontal: false,
       endingShape: 'rounded',
       borderRadius: 10,
       borderRadiusApplication: 'end',
       colors: {
        backgroundBarColors: ['#C7ECFF', '#C7ECFF'], // Warna background bar
        backgroundBarOpacity: 1,
      },
    },
  },
  series: [{
    name: 'Produk Terjual',
    data: [800, 450, 900, 550, 480, 760, 270,]
  }, ],
  stroke: {
    show: false,
    width: 2,
    colors: ['transparent']
  },
  xaxis: {
    categories: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu',],
    labels: {
      style: {
        colors: '#000'
      }
    }
  },
  fill: {
    opacity: 1
  },
  
  colors: ['#10AEFF'], 
  legend: {
    show: false,
    position: 'top',
    horizontalAlign: 'right',
   
  }

}

var chartBar = new ApexCharts(
  document.querySelector("#withdrawnWeek"),
  optionsBar
);

chartBar.render();



var optionsBar = {
  chart: {
    height: '100%',
    type: 'bar',
    
  },
  yaxis: {
    labels: {
      style: {
        fontSize: '12px', 
        fontFamily: 'Urbanist',
        fontWeight: 400
      },
    },
    min: 0, 
    max: 1000, 
    tickAmount: 5,
  },
  plotOptions: {
    bar: {
      columnWidth: '50%',
      horizontal: false,
        endingShape: 'rounded',
        borderRadius: 10,
        borderRadiusApplication: 'end',
        colors: {
        backgroundBarColors: ['#C7ECFF', '#C7ECFF'], // Warna background bar
        backgroundBarOpacity: 1,
      },
    },
  },
  series: [{
    name: 'Produk Terjual',
    data: [800, 450, 900, 550, 480, 760, 270, 870, 970, 786, 677, 728 ]
  }, ],
  stroke: {
    show: false,
    width: 2,
    colors: ['transparent']
  },
  xaxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des',],
    labels: {
      style: {
        colors: '#000'
      }
    }
  },
  fill: {
    opacity: 1
  },
  
  colors: ['#10AEFF'], 
  legend: {
    show: false,
    position: 'top',
    horizontalAlign: 'right',
    
  }

}

var chartBar = new ApexCharts(
  document.querySelector("#withdrawnMonth"),
  optionsBar
);

chartBar.render();
