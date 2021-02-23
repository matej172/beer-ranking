function addBeer(title) {
  (async () => {
    const rawResponse = await fetch(
      "http://localhost:8001/api.php?entity=beer",
      {
        method: "POST",
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ title: title }),
      }
    );
    const content = await rawResponse.json();

    fetch("http://localhost:8001/api.php")
      .then((res) => res.json())
      .then((out) => {
        console.log(out);
        document.getElementById("beer-list").innerHTML = "";
        out.forEach((beer) => {
          document.getElementById("beer-list").innerHTML +=
            "<li>" + beer.title + ": " + beer.rating + "</li>";
        });
      })
      .catch((err) => {
        throw err;
      });
    //console.log(content);
  })();
}
