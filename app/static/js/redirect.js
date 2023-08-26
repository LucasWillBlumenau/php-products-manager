const redirect = async relativeURLPath => {
    const response = await fetch(relativeURLPath)
    location.href = response.url
} 
