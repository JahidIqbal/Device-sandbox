import { useState, useEffect } from 'react'

function App() {
  const [count, setCount] = useState(0)
  const [apiMessage, setApiMessage] = useState('')

  useEffect(() => {
    fetch('http://localhost:8082/api/test')
      .then(response => response.json())
      .then(data => setApiMessage(data.message))
      .catch(error => setApiMessage('Error: ' + error.message))
  }, [])

  return (
    <div>
      <h1>Test App</h1>
      <p>API Message: {apiMessage}</p>
      <button onClick={() => setCount(count + 1)}>Count: {count}</button>
    </div>
  )
}

export default App