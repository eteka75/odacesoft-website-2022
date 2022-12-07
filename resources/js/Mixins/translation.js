export const translations = {
    methods: {
        __(key, replacements = {}) {
            let tr = window._translations[key] || key;
            return tr;
        },
        liveSubstr(data, debut = 0, fin = 0, ext = '...') {
            return data.substr(debut, fin) + ext;
        },
    }
}
