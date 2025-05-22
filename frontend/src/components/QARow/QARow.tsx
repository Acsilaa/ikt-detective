export type QARProps = {
    question: string,
    asker: string,
    answer: string
}
export default function QARow(props:QARProps){
    return (
    <>
    <div className="bg-white w-1/1 p-5 text-2xl rounded-[5px] flex-column shrink-0 hover:scale-102 transition-[.4s] hover:shadow-violet-600/35 hover:shadow-xl">
        <p className="text-violet-600 text-[15px]">{props.asker}</p>
        <p className="text-black font-semibold text-3xl mt-1 mb-2">{props.question}</p>
        <p className="text-black">{props.answer}</p>
    </div>
    </>)
}