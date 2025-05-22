import { useParams } from 'react-router-dom'

export function Subject(){
    const {id} = useParams()
    return (
    <>
    <p>{id}</p>
    </>)
}