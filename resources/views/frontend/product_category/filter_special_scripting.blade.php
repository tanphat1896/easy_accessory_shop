<script>
    let url = window.location.href;
    let parts = /(.*)\?(.*)/.exec(url);
    let baseUrl = parts == null ? url : parts[1];
    let query = parts == null ? '' : parts[2];

    console.log(baseUrl);
    console.log(query);

    function filterPrice(e) {
        e.preventDefault();
        let priceMin = document.getElementById('price-min').value;
        let priceMax = document.getElementById('price-max').value;
        if (priceMax > 0)
            query = bindValue('max', priceMax);

        if (priceMin > 0)
            query = bindValue('min', priceMin);

        redirect();
    }

    function filterBrand(e) {
        e.preventDefault();
        let checkboxes = document.querySelectorAll('.ui.checkbox input:checked');
        checkboxes = [...checkboxes];
        let values = "";
        checkboxes.forEach((checkbox) => {
            values += checkbox.value + ";";
        });
        filtering('t', values);
    }

    function filtering(key, value) {
        query = bindValue(key, value);
        redirect();
    }

    function bindValue(key, value) {
        if (hasKey(key))
            return bindExistValue(key, value);

        return query === ""
            ? `${key}=${value}`
            : `${query}&${key}=${value}`;
    }

    function hasKey(key) {
        return query.indexOf(key) > -1;
    }

    function bindExistValue(key, value) {
        let pattern = new RegExp(`${key}=(.+)`, 'i');
        let matching = pattern.exec(query)[1];
        let oldValue = matching.indexOf('&') > -1
            ? matching.split('&')[0]
            : matching;
        return query.replace(`${key}=${oldValue}`, `${key}=${value}`);
    }

    function redirect() {
        window.location.href = baseUrl + "?" + query;
    }

    function removeFiltering(key, value) {
        query = allowMultipleVal(key) ? removeValueFrom(key, value) : query.replace(new RegExp(`&?${key}=${value}`), '');
        window.location.href = query === ""
            ? baseUrl
            : baseUrl + "?" + query;
    }

    function allowMultipleVal(key) {
        return key === "t";
    }

    function removeValueFrom(key, value) {
        return query.replace(`${value};`, '');
    }
</script>