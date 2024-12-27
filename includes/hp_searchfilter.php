<form action="searchfilter.php" method="GET">
    <div class="filter-section">
        <label for="price_min">Prijs:</label>
        <input type="number" id="price_min" name="price_min" placeholder="Min" min="0" max="50000">
        tot
        <input type="number" id="price_max" name="price_max" placeholder="Max" min="0" max="50000">
    </div>

    <div class="filter-section">
        <label for="brand">Merk:</label>
        <select id="brand" name="brand">
            <option value="">Selecteer Merk</option>
            <option value="BMW">BMW</option>
            <option value="Audi">Audi</option>
            <option value="Volkswagen">Volkswagen</option>
        </select>
    </div>

    <div class="filter-section">
        <label for="model">Model:</label>
        <select id="model" name="model">
            <option value="">Selecteer Model</option>
        </select>
    </div>

    <div class="filter-section">
        <label for="fueltype">Brandstof:</label>
        <select id="fueltype" name="fueltype">
            <option value="">Selecteer Brandstof</option>
            <option value="benzine">Benzine</option>
            <option value="diesel">Diesel</option>
            <option value="hybride">Hybride</option>
            <option value="elektrisch">Elektrisch</option>
        </select>
    </div>

    <div class="filter-section">
        <label for="transmission">Transmissie:</label>
        <select id="transmission" name="transmission">
            <option value="">Selecteer Transmissie</option>
            <option value="handmatig">Handmatig</option>
            <option value="automatisch">Automatisch</option>
        </select>
    </div>

    <div class="filter-section">
        <label for="colour">Kleur:</label>
        <select id="colour" name="colour">
            <option value="">Selecteer Kleur</option>
            <option value="wit">Wit</option>
            <option value="zwart">Zwart</option>
            <option value="grijs">Grijs</option>
            <option value="blauw">Blauw</option>
            <option value="rood">Rood</option>
            <option value="groen">Groen</option>
            <option value="geel">Geel</option>
            <option value="bruin">Bruin</option>
        </select>
    </div>

    <div class="filter-section">
        <label for="doors">Aantal Deuren:</label>
        <select id="doors" name="doors">
            <option value="">Selecteer Aantal Deuren</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>

    <div class="filter-section">
        <label for="bodywork">Carrosserie:</label>
        <select id="bodywork" name="bodywork">
            <option value="">Selecteer Carrosserie</option>
            <option value="hatchback">Hatchback</option>
            <option value="station_wagon">Station Wagon</option>
            <option value="suv">SUV</option>
            <option value="coupe">Coupe</option>
            <option value="sedan">Sedan</option>
            <option value="convertible">Cabriolet</option>
            <option value="pickup">Pick-up</option>
            <option value="mpv">MPV</option>
            <option value="minivan">Minivan</option>
            <option value="roadster">Roadster</option>
            <option value="coupe_cabriolet">Coupé-Cabriolet</option>
        </select>
    </div>

    <button type="submit">Zoek</button>
</form>