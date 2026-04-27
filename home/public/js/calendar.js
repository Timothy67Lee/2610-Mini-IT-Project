document.addEventListener('DOMContentLoaded', function() {
    const monthNames = [
        "January","February","March","April","May","June",
        "July","August","September","October","November","December"
    ];
    let currentDate = new Date();

    function renderCalendar(dateObj) {
        const year = dateObj.getFullYear();
        const month = dateObj.getMonth();
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month+1, 0).getDate();

        document.getElementById('calendar-title').textContent =
            monthNames[month] + " " + year;

        const calendarBody = document.getElementById('calendar-body');
        calendarBody.innerHTML = "";

        let date = 1;
        for (let i = 0; i < 6; i++) {
            let row = document.createElement("tr");
            for (let j = 0; j < 7; j++) {
                let cell = document.createElement("td");
                if (i === 0 && j < firstDay) {
                    cell.textContent = "";
                } else if (date > daysInMonth) {
                    cell.textContent = "";
                } else {
                    cell.textContent = date;
                    // Highlight today if same month/year
                    const today = new Date();
                    if (date === today.getDate() &&
                        month === today.getMonth() &&
                        year === today.getFullYear()) {
                        cell.style.backgroundColor = "#2563eb";
                        cell.style.color = "white";
                        cell.style.fontWeight = "bold";
                    }
                    date++;
                }
                row.appendChild(cell);
            }
            calendarBody.appendChild(row);
        }
    }

    // Initial render
    renderCalendar(currentDate);

    // Navigation buttons
    document.getElementById('prevMonth').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    });

    document.getElementById('nextMonth').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    });
});
