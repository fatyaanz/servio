<div class="chart-section">
    <div class="chart-header">
        <div class="chart-title">
            <h2>Pendapatan & Pesanan</h2>
            <p>7 Hari Terakhir</p>
        </div>
    </div>
    
    <div class="chart-container">
        <canvas id="dashboardChart"></canvas>
    </div>
</div>

<style>
.chart-section {
    background: white;
    border-radius: 20px;
    padding: 24px;
    border: 1px solid #eef0f4;
    box-shadow: 0 4px 15px rgba(15,23,42,0.03);
    margin-bottom: 18px; /* Same as grid gap */
}

.chart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.chart-title h2 {
    font-size: 16px;
    font-weight: 700;
    color: #111827;
    margin-bottom: 4px;
}

.chart-title p {
    font-size: 13px;
    color: #6b7280;
    margin: 0;
}

.chart-container {
    position: relative;
    height: 300px;
    width: 100%;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('dashboardChart').getContext('2d');
    
    // Data dari Controller
    const labels = {!! json_encode($chartLabels) !!};
    const incomeData = {!! json_encode($chartIncome) !!};
    const ordersData = {!! json_encode($chartOrders) !!};

    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Pendapatan (Rp)',
                    data: incomeData,
                    type: 'bar',
                    backgroundColor: 'rgba(34, 197, 94, 0.8)', // Green
                    borderRadius: 6,
                    yAxisID: 'y'
                },
                {
                    label: 'Pesanan Selesai',
                    data: ordersData,
                    type: 'line',
                    borderColor: '#3b82f6', // Blue
                    backgroundColor: '#3b82f6',
                    borderWidth: 3,
                    tension: 0.4,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#3b82f6',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    yAxisID: 'y1'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        boxWidth: 8,
                        font: {
                            family: "'Inter', sans-serif",
                            size: 12
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(15, 23, 42, 0.9)',
                    titleFont: {
                        family: "'Inter', sans-serif",
                        size: 13
                    },
                    bodyFont: {
                        family: "'Inter', sans-serif",
                        size: 12
                    },
                    padding: 12,
                    cornerRadius: 8,
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.datasetIndex === 0) { // Income
                                label += 'Rp ' + new Intl.NumberFormat('id-ID').format(context.parsed.y);
                            } else { // Orders
                                label += context.parsed.y + ' Pesanan';
                            }
                            return label;
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            family: "'Inter', sans-serif",
                            size: 11
                        },
                        color: '#6b7280'
                    }
                },
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    grid: {
                        color: '#f3f4f6',
                        drawBorder: false
                    },
                    ticks: {
                        font: {
                            family: "'Inter', sans-serif",
                            size: 11
                        },
                        color: '#6b7280',
                        callback: function(value) {
                            if(value === 0) return 0;
                            // Format to Ribuan / Jutaan untuk ringkas
                            if(value >= 1000000) {
                                return (value / 1000000) + ' Jt';
                            } else if (value >= 1000) {
                                return (value / 1000) + ' Rb';
                            }
                            return value;
                        }
                    }
                },
                y1: {
                    type: 'linear',
                    display: true,
                    position: 'right',
                    grid: {
                        drawOnChartArea: false, // only want the grid lines for one axis to show up
                    },
                    ticks: {
                        font: {
                            family: "'Inter', sans-serif",
                            size: 11
                        },
                        color: '#6b7280',
                        stepSize: 1
                    }
                }
            }
        }
    });
});
</script>
