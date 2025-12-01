document.addEventListener("DOMContentLoaded", () => {
    
    const coatListContainer = document.getElementById("spcv-coat-list");
    const coatDisplay = document.getElementById("spcv-active-coat");

    if (!coatListContainer) return;

    fetch(spcv_config.manifest_url)
        .then(res => res.json())
        .then(data => {
            const coats = data.coats || [];

            coats.forEach((coatPath, index) => {
                const fullPath = spcv_config.base_url + coatPath;

                const item = document.createElement("div");
                item.classList.add("spcv-coat-item");

                const img = document.createElement("img");
                img.src = fullPath;

                item.appendChild(img);
                coatListContainer.appendChild(item);

                // Select first coat automatically
                if (index === 0) item.classList.add("active");

                item.addEventListener("click", () => {

                    // Remove old active
                    document.querySelectorAll(".spcv-coat-item")
                        .forEach(i => i.classList.remove("active"));

                    item.classList.add("active");

                    // Swap coat on the dog viewer
                    coatDisplay.src = fullPath;
                });
            });
        });
});
