(function () {

  // add a hook that will allow us to subscribe to the Bulk Generator Redux store events (https://redux.js.org/api/store)
  gform.addAction('gpdf-bulk-generator-redux-store', function (store) {

    // store the current Bulk Generator screen so we can check it when it gets updated
    var currentPath

    // subscribe to all store events
    store.subscribe(function (e) {

      // Grab the current store state (https://redux.js.org/api/store#getstate)
      var currentState = store.getState()

      // Save the old route and grab the new route
      var previousPath = currentPath
      currentPath = currentState.router.location.pathname

      // Run an action when the route first points to /step/3 (when the zip is downloaded)
      if (previousPath !== currentPath && currentPath === '/step/3') {

        // Log the full Redux state tree
        console.log(currentState)

        // Log the current entry IDs that were processed this request
        console.log(currentState.form.selectedEntriesId)

        // Do something else here like make an API request
      }
    })
  })

})()