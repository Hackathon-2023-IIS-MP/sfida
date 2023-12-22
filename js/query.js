/** Get query paramethers in form of object
 * @returns {Object} Query paramethers
 */
function getQuery() {
    let query = {};
    
    for (const keyval of window.location.search.substring(1).split("&")) {
        let [key, val] = keyval.split("=");
        query[key] = val;
    }

    return query
}
