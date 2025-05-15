const TOKEN_FOR_IP = import.meta.env.VITE_TOKEN_FOR_IP;

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('ip-form');
    const table = document.getElementById('ip-table');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const ip = document.getElementById('ip-input').value.trim();
        const url = `https://ipinfo.io/${ip}/geo?token=${TOKEN_FOR_IP}`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error getting data.');
                }
                return response.json();
            })
            .then(data => {
                document.getElementById('td-ip').innerText = data.ip || '';
                document.getElementById('td-city').innerText = data.city || '';
                document.getElementById('td-region').innerText = data.region || '';
                document.getElementById('td-country').innerText = data.country || '';
                document.getElementById('td-loc').innerText = data.loc || '';
                document.getElementById('td-org').innerText = data.org || '';
                table.style.display = 'table';
            })
            .catch(error => {
                alert('Error: ' + error.message);
                table.style.display = 'none';
            });
    });
});
