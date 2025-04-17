document.addEventListener('DOMContentLoaded', function () {
  const incomeData = JSON.parse(document.getElementById('barChart').dataset.income);
  const expenseData = JSON.parse(document.getElementById('barChart').dataset.expense);

  const labels = [...new Set([...incomeData.map(i => i.month), ...expenseData.map(e => e.month)])];

  const incomeTotals = labels.map(label => {
    const found = incomeData.find(i => i.month === label);
    return found ? found.total : 0;
  });

  const expenseTotals = labels.map(label => {
    const found = expenseData.find(e => e.month === label);
    return found ? found.total : 0;
  });

  const ctx = document.getElementById('barChart')?.getContext('2d');
  if (ctx) {
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [
          {
            label: 'Income',
            data: incomeTotals,
            backgroundColor: '#1cc88a',
            borderColor: '#1cc88a',
            borderWidth: 1
          },
          {
            label: 'Expense',
            data: expenseTotals,
            backgroundColor: '#e74a3b',
            borderColor: '#e74a3b',
            borderWidth: 1
          }
        ]
      },
      options: {
        responsive: true,
        plugins: {
          tooltip: {
            callbacks: {
              label: function(context) {
                let rawValue = context.raw || 0;
                let formatted = numberFormat(rawValue);
                return `${context.dataset.label}: Rp ${formatted}`;
              }
            }
          },
          legend: {
            position: 'top',
          },
          title: {
            display: false,
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: function(value) {
                return 'Rp' + value.toLocaleString('id-ID', {
                  minimumFractionDigits: 0,
                  maximumFractionDigits: 0
                });
              }
            }
          }
        }
      }
    });
  }
});

function numberFormat(value) {
  value = parseInt(value) || 0;
  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}