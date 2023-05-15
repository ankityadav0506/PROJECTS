import React from 'react'
import Pagination from './Pagination'
import Search from './Search'
import Stories from './Stories'

const App = () => {
  return (
    <>
      <div>Welcome to News Website</div>
      <Search />
      <Pagination />
      <Stories />
    </>
  )
}

export default App