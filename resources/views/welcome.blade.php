<!DOCTYPE html>
<html>

<head>
    <title>PEOPLE DATA</title>
    <link rel="stylesheet" href="{{ asset('css/data-map.css') }}">
</head>

<body>
    <div id="app">

        <h1>PEOPLE DATA</h1>
        <button id="nextBtn">Next Person</button>
        <div id="dataContainer">
            <!-- Data will be dynamically loaded here from JavaScript -->
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var persons = JSON.parse('{!! addslashes(json_encode($persons)) !!}');
        let currentPersonIndex = 0;
        const dataContainer = document.getElementById('dataContainer');

        function displayPerson(person) {
            const personDetails = `
        <div class="person-details">
            <span class="person-index">${currentPersonIndex + 1}</span>
            <div class="person-info">
                <span>Name:<span class="person-name">${person.name}</span></span>
                <span>Location:<span class="person-location"> ${person.location}</span></span>
            </div>
        </div>
        `;
            dataContainer.insertAdjacentHTML('beforeend', personDetails);
        }

        function loadNextPerson() {
            currentPersonIndex++;
            if (currentPersonIndex >= persons.length) {
                alert('No more people!');
                currentPersonIndex = persons.length - 1;
            } else {
                displayPerson(persons[currentPersonIndex]);
            }
        }

        const nextBtn = document.getElementById('nextBtn');
        nextBtn.addEventListener('click', loadNextPerson);

        displayPerson(persons[currentPersonIndex]);
    </script>

</body>

</html>