const API_BASE = "https://restadmindev.utho.com/v2";

/**
 * Get auth token
 */



function getAuthToken() {
    return "nKrgfYvTXtRJdLASDHbqspPkGOFmEaxwNCZQUzIeVoWMjyuchiBl";
}

/**
 * Reusable API call function (GET / POST)
 * @param {string} endpoint
 * @param {Object} params
 * @param {string} method
 * @returns {Promise<Object|null>}
 */
async function callApi(endpoint, params = {}, method = "GET") {
    // console.log("Raw params:", params);

    try {
        const token = getAuthToken();
        if (!token) {
            console.error("Auth token not found");
            return null;
        }

        let url = `${API_BASE}/${endpoint}`;

        const options = {
            method,
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json",
                "Authorization": `Bearer ${token}`
            }
        };

        // ---------- FIX START ----------
        if (method === "GET" && params && Object.keys(params).length) {

            // Remove empty / undefined values
            const cleanParams = Object.fromEntries(
                Object.entries(params)
                    .filter(([_, v]) => v !== undefined && v !== null && v !== "")
                    .map(([k, v]) => [k, String(v)])
            );

            const queryString = new URLSearchParams(cleanParams).toString();

            if (queryString) {
                url += (url.includes("?") ? "&" : "?") + queryString;
                console.log(url);
            }
        } 
        // ---------- FIX END ----------

        else if (method !== "GET") {
            options.body = JSON.stringify(params);
        }

        // console.log("Final API URL:", url);

        const response = await fetch(url, options);

        if (response.status === 401) {
            console.warn("Token expired");
            localStorage.removeItem("auth_token");
            return null;
        }

        if (!response.ok) {
            throw new Error(`API Error ${response.status}`);
        }

        return await response.json();

    } catch (err) {
        console.error("API Error:", err);
        return null;
    }
}

