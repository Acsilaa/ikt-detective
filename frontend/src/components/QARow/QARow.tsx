export type QARProps = {
    question: string,
    asker: string,
    answer: string
}
export default function QARow(props:QARProps){
    return (
    <>
    <div>
        <p>{props.asker}</p>
        <p>{props.question}</p>
        <p>{props.answer}</p>
    </div>
    </>)
}